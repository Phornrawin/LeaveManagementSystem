<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RequestsController extends Controller
{
    public function index()
    {
        $me = Auth::User();
        $users = DB::table('users')->where('supervisor_id',$me->id)->get();
        $ldate = date('Y-m-d 00:00:00');
        $leaves = DB::table('leaves')->whereDate('start_date','<',$ldate)->where('status','wait for approval')->get();
        $categories = DB::table('categories')->get();
        $tasks = DB::table('tasks')->get();



        

        



        return view('requests.index', compact('leaves','users'));
    }
}
