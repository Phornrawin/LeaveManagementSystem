<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SummaryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($year = 'Y', $month = 'M') {
        $hasMonth = true;
        if ($year == 'Y' and $month == 'M') {
            $date = date('F, Y');
            $year = date('Y');
            $month = date('m');
        } else if ($month == 'M') {
            $date = date('Y', strtotime($year.'-01'));
            $year = $date;
            $month = date('m', strtotime($year.'-'.$month));
            $hasMonth = false;
        } else {
            $date = date('F, Y', strtotime($year.'-'.$month));
            $month = date('m', strtotime($year.'-'.$month));
        }
        $dayOfWeek = date('w', strtotime($year.'-'.$month.'-01'));
        $sub_ids = \Auth::user()->subordinates->pluck('id')->toArray();
        $leaves = \App\Leave::onMonth($year.'-'.$month)->whereIn('user_id', $sub_ids)->get();
        return $leaves;
        $month_name = date('F', strtotime($year.'-'.$month.'-1'));
        return view('summary.index', compact('leaves', 'date', 'dayOfWeek', 'year', 'month', 'month_name', 'hasMonth'));
    }

    public function year($year = 'Y') {
        if ($year=='Y') {
            $year = date('Y');
        }
        return view('summary.year', compact('year'));
    }

    public function month($year, $month) {
        $date = date('F, Y', strtotime($year.'-'.$month));
        $month = date('m', strtotime($year.'-'.$month));
        $dayOfWeek = date('w', strtotime($year.'-'.$month.'-01'));
        $sub_ids = \Auth::user()->subordinates->pluck('id')->toArray();
        $sub_count = count($sub_ids);
        $details = array();
        for($i=1;$i<=cal_days_in_month(CAL_GREGORIAN, $month, $year);$i++) {
            $waited = \App\Leave::onMonth($year.'-'.$month)->whereIn('user_id', $sub_ids)->whereIn('status', ['new', 'wait for approval'])->onDate($year.'-'.$month.'-'.$i)->count();
            $leaves = \App\Leave::onMonth($year.'-'.$month)->whereIn('user_id', $sub_ids)->where('status', 'approved')->onDate($year.'-'.$month.'-'.$i)->count();
            $details[] = [
                'date' => $i,
                'available' => $sub_count - $waited - $leaves,
                'waits' => $waited,
                'leaves' => $leaves
            ];
        }

        return view('summary.month', compact('details', 'date', 'dayOfWeek', 'year', 'month'));
    }
}
