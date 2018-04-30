<?php

namespace App\Http\Controllers;

use App\User;
use App\Task;
use App\Leave;
use App\Position;
use Illuminate\Http\Request;

class SubordinateController extends Controller
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
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $subs = User::where('supervisor_id', \Auth::user()->id)->get();
    return view('subordinate.index', [ 'subs' => $subs ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $positions = Position::all();
    $subs = User::where('supervisor_id', \Auth::user()->id)->get();
    return view('subordinate.assign', [ 'positions' => $positions, 'subs' => $subs ]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request, User $user)
  {
    $task = new Task;
    $task->name = $request->input('name');
    $task->assign_to = $user->id;
    $task->save();
    return redirect('/subs/' . $user->id);
  }
  public function assignTask(Request $request)
  {
    if ($request->input('mode') === 'all')
    {
      $subs = User::where('supervisor_id', \Auth::user()->id)->get();
      foreach ($subs as $sub)
      {
        $task = new Task;
        $task->name = $request->input('name');
        $task->assign_to = $sub->id;
        $task->save();
      }
    }
    else if ($request->input('mode') === 'pos')
    {
      $subs = User::where('supervisor_id', \Auth::user()->id)->get();
      foreach ($subs as $sub)
      {
        if ($sub->position->name === $request->input('position'))
        {
          $task = new Task;
          $task->name = $request->input('name');
          $task->assign_to = $sub->id;
          $task->save();
        }
      }
    }
    else if ($request->input('mode') === 'spec')
    {
      $task = new Task;
      $task->name = $request->input('name');
      $task->assign_to = $request->input('sub-id');
      $task->save();
    }
    return redirect('/subs/assign');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\User  $user
  * @return \Illuminate\Http\Response
  */
  public function show(User $user)
  {
    if ($user->supervisor_id !== \Auth::user()->id) {
      abort(404);
    }
    $tasks = Task::where('assign_to', $user->id)->get();
    $subs = User::where('supervisor_id', \Auth::user()->id)->get();
    $leaves = Leave::where('user_id', $user->id)->get();
    return view('subordinate.show', [ 'sub' => $user, 'tasks' => $tasks, 'leaves' => $leaves ]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\User  $user
  * @return \Illuminate\Http\Response
  */
  public function edit(User $user)
  {

  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\User  $user
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, User $user)
  {
    $leave = Leave::find($request->input('leave_id'));
    $leave->status = $request->input('status');
    $leave->save();
    return redirect('/subs/' . $user->id);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\User  $user
  * @return \Illuminate\Http\Response
  */
  public function destroy(User $user)
  {
    //
  }
}
