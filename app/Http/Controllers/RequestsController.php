<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Leave;

class RequestsController extends Controller
{
    public function index()
    {
        $me = Auth::User();

        $current = Leave::join('users','leaves.user_id','=','users.id')
            ->select('leaves.*','users.supervisor_id','users.firstname','users.lastname')
            ->where('supervisor_id',$me->id)
            ->where('status','wait for approval')
            ->get();

        $history = Leave::join('users','leaves.user_id','=','users.id')
            ->select('leaves.*','users.supervisor_id','users.firstname','users.lastname')
            ->where('supervisor_id',$me->id)
            ->whereIn('status',['approved','rejected'])
            ->get();

        return view('requests.index', compact('current','history'));
    }
    public function show($id){
        $leave = Leave::findOrFail($id);

        $leave_super = Leave::findOrFail($id);
        $super = User::findOrFail($leave_super->user_id)->get()->first()->supervisor_id;
        $me = Auth::User()->id;
        return view('requests.show',compact('leave','super','me'));

    }
    public function approved($id){
        $me = Auth::User();
        $leave = Leave::findOrFail($id);
        $super = User::findOrFail($leave->user_id)->supervisor_id;

        if ($me->id == $super){
            Leave::findOrFail($id)->update(['status'=>'approved']);
            return redirect('/requests');
        }else{
            return redirect('/');
        }
    }
    public function rejected($id){
        $me = Auth::User();
        $leave = Leave::findOrFail($id);
        $super = User::findOrFail($leave->user_id)->supervisor_id;

        if ($me->id == $super){
            Leave::findOrFail($id)->update(['status'=>'rejected']);
            return redirect('/requests');
        }else{
            return redirect('/');
        }
    }
}
