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
        ->orderBy('start_date','desc')
        ->where('user_id',$me->id)
            ->get();
        $history = Leave::whereIn('status',['cancel','approved','rejected','rejected by substitute'])
        ->orderBy('start_date','desc')
        ->where('user_id',$me->id)
            ->get();

        return view('myrequests.index',compact('current','history'));
    }

    public function update($id){
        $me = Auth::User();
        $leave = Leave::find($id);
        if ($me->id == $leave->user_id){
            Leave::find($id)->update(['status'=>'cancel']);
            return redirect('/myrequests');
        }else{
            return redirect('/');
        }
    }

    public function create() {
        

        $users = Auth::user()->subordinates;
        $tasks = Auth::user()->tasks;
        $categories = \App\Category::all();
        $days = array();
        $year = date("Y");
        foreach ($categories as $category) {
            
            $leaves = Leave::where("user_id", Auth::user()->id)->where("status", "approved")->where("category_id", $category->id)->where("start_date", 'like', $year.'%')->where("end_date", 'like', $year.'%')->get();
            
            $day = 0;
            foreach ($leaves as $tmp) {            
                $pos = strpos($tmp->end_date, $year);
                if ($pos === 0) {
                    $day += date_diff(date_create($tmp->start_date), date_create($tmp->end_date))->format("%a") + 1;
                }
            }
            $days[$category->id] = $category->days - $day;
        }
        // return $days;
        return view('myrequests.create', compact('users', 'tasks', 'categories', 'days'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'substitute_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'task_id' => 'required|exists:tasks,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        try {
            $leave = new Leave;
            $leave->user_id = Auth::user()->id;
            $leave->substitute_id = $request->input('substitute_id');
            $leave->category_id = $request->input('category_id');
            $leave->task_id = $request->input('task_id');
            $leave->start_date = $request->input('start_date');
            $leave->end_date = $request->input('end_date');
            $leave->status = "new";
            $year = date("Y", strtotime($leave->start_date));
            $leaves = Leave::where("user_id", $leave->user_id)->where("status", "approved")->where("category_id", $leave->category_id)->where("start_date", 'like', $year.'%')->where("end_date", 'like', $year.'%')->get();
            $c_days = date_diff(date_create($leave->start_date), date_create($leave->end_date))->format("%a") + 1;
            $days = 0;
            foreach ($leaves as $tmp) {            
                $pos = strpos($tmp->end_date, $year);
                if ($pos === 0) {
                    $days += date_diff(date_create($tmp->start_date), date_create($tmp->end_date))->format("%a") + 1;
                }
            }
            if ($leave->category->days < $days + $c_days) {
                
                return back()->withInput()->withErrors(["You have not enough days"]);
            } 
    
            $leave->save();
            return redirect('/myrequests');
        } catch(Exception $e) {
            return back()->withInput();
        }
    }
}
