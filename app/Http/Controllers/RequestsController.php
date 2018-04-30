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
        // $users = DB::table('users')->where('supervisor_id',$me->id)->get();
        // $ldate = date('Y-m-d 00:00:00');
        // $leaves = DB::table('leaves')->whereDate('start_date','<',$ldate)->where('status','wait for approval')->get();
        // $categories = DB::table('categories')->get();
        // $tasks = DB::table('tasks')->get();

        $current = DB::table('leaves')
            ->join('users','leaves.user_id','=','users.id')
            ->select('leaves.*','users.supervisor_id','users.firstname','users.lastname')
            ->where('supervisor_id',$me->id)
            ->where('status','wait for approval')
            ->get();

        $history = DB::table('leaves')
            ->join('users','leaves.user_id','=','users.id')
            ->select('leaves.*','users.supervisor_id','users.firstname','users.lastname')
            ->where('supervisor_id',$me->id)
            ->whereIn('status',['approved','rejected'])
            ->get();

        return view('requests.index', compact('current','history'));
    }
    public function show($id){
        $leave = DB::table('leaves')->find($id);
        return view('requests.show',compact('leave'));

    }
    public function approved($id){
        $me = Auth::User();
        $leave = DB::table('leaves')->where('id',$id)->get()->first();
        $super = DB::table('users')->where('id',$leave->user_id)->get()->first()->supervisor_id;

        if ($me->id == $super){
            DB::table('leaves')->where('id',$id)->update(['status'=>'approved']);
            return redirect('/requests');
        }else{
            return redirect('/');
        }
    }
    public function rejected($id){
        $me = Auth::User();
        $leave = DB::table('leaves')->where('id',$id)->get()->first();
        $super = DB::table('users')->where('id',$leave->user_id)->get()->first()->supervisor_id;

        if ($me->id == $super){
            DB::table('leaves')->where('id',$id)->update(['status'=>'rejected']);
            return redirect('/requests');
        }else{
            return redirect('/');
        }
    }
}
