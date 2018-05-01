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

    public function year($year = 'Y') {
        if ($year=='Y') {
            $year = date('Y');
            $month = date('m');
            return redirect('/summary/'.$year.'/'.$month);
        }
        if ($year < 1902) {
            abort(404);
        }
        return view('summary.year', compact('year'));
    }

    public function month($year, $month) {

        if ($year < 1902) {
            abort(404);
        }
        $date = date('F, Y', strtotime($year.'-'.$month));
        $month = date('m', strtotime($year.'-'.$month));
        $dayOfWeek = date('w', strtotime($year.'-'.$month.'-01'));
        $sub_ids = \Auth::user()->subordinates->pluck('id')->toArray();
        $sub_count = count($sub_ids);
        $details = array();
        for($i=1;$i<=cal_days_in_month(CAL_GREGORIAN, $month, $year);$i++) {
            $waited = \App\Leave::whereIn('user_id', $sub_ids)->whereIn('status', ['new', 'wait for approval'])->onDate($year.'-'.$month.'-'.$i)->count();
            $leaves = \App\Leave::whereIn('user_id', $sub_ids)->where('status', 'approved')->onDate($year.'-'.$month.'-'.$i)->count();
            $details[] = [
                'date' => $i,
                'available' => $sub_count - $waited - $leaves,
                'waits' => $waited,
                'leaves' => $leaves
            ];
        }

        return view('summary.month', compact('details', 'date', 'dayOfWeek', 'year', 'month'));
    }

    public function day($year, $month, $day) {

        if ($year < 1902) {
            abort(404);
        }
        if ($day > cal_days_in_month(CAL_GREGORIAN, $month, $year) or $day <= 0) {
            abort(404);
        }
        $subordinates = \Auth::user()->subordinates;
        $sub_ids = $subordinates->pluck('id')->toArray();
        $leaves = \App\Leave::onDate($year.'-'.$month.'-'.$day)->whereIn('user_id', $sub_ids)->get();

        $active = $subordinates;
        $pending = collect();
        $absence = collect();
        foreach ($leaves as $leave) {
            if ($leave->isApproved()) {
                $absence->push($leave);
                $active = $active->filter(function($item) use($leave){
                    return $item->id != $leave->user->id;
                })->values()->all();

            } else if ($leave->isPending()) {
                $pending->push($leave);
                $active = $active->filter(function($item) use($leave){
                    return $item->id != $leave->user->id;
                })->values()->all();
            }
        }
        $count = max(count($active), count($pending), count($absence));
        $date = date("d F Y", strtotime($year.'-'.$month.'-'.$day));
        return view('summary.day', compact('count', 'active', 'pending', 'absence', 'year', 'month', 'day', 'date'));
    }
}
