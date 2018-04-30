<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MyRequestsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
  
    public function index(){
        $me = Auth::User();
        $ldate = date('Y-m-d 00:00:00');
        $current = DB::table('leaves')->whereDate('start_date','>',$ldate)->where('user_id',$me->id)->get();
        $history = DB::table('leaves')->whereDate('start_date','<=',$ldate)->where('user_id',$me->id)->get();
        
        return view('myrequests.index',compact('current','history'));
    }

    public function update($id){
        $me = Auth::User();
        $leave = DB::table('leaves')->where('id',$id)->first();
        if ($me->id == $leave->user_id){
            $leave->status = 'cancel';
            return redirect('/myrequests');
        }
    }
}
