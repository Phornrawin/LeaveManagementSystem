<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Leave;

class MyRequestsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
  
    public function index(){
        $me = Auth::User();
        $ldate = date('Y-m-d 00:00:00');
        $current = Leave::whereIn('status',['wait for approval','new'])
            ->where('user_id',$me->id)
            ->get();
        $history = Leave::whereIn('status',['cancel','approved','rejected','rejected by substitute'])
            ->where('user_id',$me->id)
            ->get();
        
        return view('myrequests.index',compact('current','history'));
    }

    public function update($id){
        $me = Auth::User();
        $leave = Leave::find($id);
        if ($me->id == $leave->user()){
            Leave::find($id)->update(['status'=>'cancel']);
            return redirect('/myrequests');
        }else{
            return redirect('/');
        }
    }

    public function create() {
        return "haha";
    }
    
    public function store(Request $request) {
        return "haha";
    }
}
