@extends('layouts.user')

@section('main')
<div>
        {{ DB::table('users')->where('id',$leave->user_id)->first()->firstname }}
        {{ DB::table('users')->where('id',$leave->substitute_id)->first()->firstname }}
        {{ DB::table('categories')->where('id',$leave->category_id)->first()->name }}
        {{ DB::table('tasks')->where('id',$leave->task_id)->first()->name }}
        {{ $leave->start_date }}
        {{ $leave->end_date }}
        {{ $leave->status }}</div>

        @if ($leave->status == 'wait for approval' and $me == $super  )
        <a class="btn btn-primary" href="{{ url('/requests/' . $leave->id) .'/approved'}}" >Approved</a>
        <a class="btn btn-primary" href="{{ url('/requests/' . $leave->id) .'/rejected'}}" >Rejected</a>
        @endif


@endsection