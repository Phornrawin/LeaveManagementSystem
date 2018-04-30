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
        $users = \Auth::user()->subordinates;
        $tasks = \Auth::user()->tasks;
        $categories = \App\Category::all();
        return view('myrequests.create', compact('users', 'tasks', 'categories'));
    }
    
    public function store(Request $request) {
        $leave = new Leave;
        $leave->user_id = $request->input('user_id');
        $leave->substitute_id = $request->input('substitute_id');
        $leave->category_id = $request->input('category_id');
        $leave->task_id = $request->input('task_id');
        $leave->start_date = $request->input('start_date');
        $leave->end_date = $request->input('end_date');
        $leave->status = $request->input('status');
        $leave->save();
        return "haha";
    }
}
