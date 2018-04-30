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
        if ($year == 'Y' and $month == 'M') {
            $date = date('M, Y');
        } else if ($month == 'M') {
            $date = date('Y');
        } else {
            $date = date('M, Y', strtotime($year.'-'.$month));
        }
        return view('summary.index', compact('date'));
    }
}
