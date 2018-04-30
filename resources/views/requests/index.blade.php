@extends('layouts.user')

@section('main')
<h1>Request for Approval</h1><br>
<h2>Current</h2>


<table class="table table-hover" style="margin-top: 50px">
    <thead>
      <tr class="table-primary">
      <th scope="col">User</th>
        <th scope="col">substitute</th>
        <th scope="col">Category</th>
        <th scope="col">Task</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date</th>
      </tr>
    </thead>
    <tbody>
      @foreach($current as $leave)
      <tr class="table-secondary" onclick="window.location='/requests/' + {{ $leave->id }}">
        <td>{{ DB::table('users')->where('id',$leave->user_id)->first()->firstname }}</td>
        <td>{{ DB::table('users')->where('id',$leave->substitute_id)->first()->firstname }}</td>
        <td>{{ DB::table('categories')->where('id',$leave->category_id)->first()->name }}</td>
        <td>{{ DB::table('tasks')->where('id',$leave->task_id)->first()->name }}</td>
        <td>{{ $leave->start_date }}</td>
        <td>{{ $leave->end_date }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
<!-- //////////////////////////////////////////////////// -->
<br>
<h2>History</h2>


<table class="table table-hover" style="margin-top: 50px">
    <thead>
      <tr class="table-primary">
        <th scope="col">User</th>
        <th scope="col">Substitute</th>
        <th scope="col">Category</th>
        <th scope="col">Task</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($history as $leave)
      <tr class="table-secondary" onclick="window.location='/requests/' + {{ $leave->id }}">
      
        <td>{{ DB::table('users')->where('id',$leave->user_id)->first()->firstname }}</td>
        <td>{{ DB::table('users')->where('id',$leave->substitute_id)->first()->firstname }}</td>
        <td>{{ DB::table('categories')->where('id',$leave->category_id)->first()->name }}</td>
        <td>{{ DB::table('tasks')->where('id',$leave->task_id)->first()->name }}</td>
        <td>{{ $leave->start_date }}</td>
        <td>{{ $leave->end_date }}</td>
        <td>{{ $leave->status }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection