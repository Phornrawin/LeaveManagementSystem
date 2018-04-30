@extends('layouts.user')

@section('main')
<?php
use App\User;
use App\Category;
use App\Task;
?>
<h1>Request for Approval</h1><br>
<h2>Current</h2>
@if (count($current) >0)


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
        <td>{{ User::findOrFail($leave->user_id)->fullname }}</td>
        <td>{{ User::findOrFail($leave->substitute_id)->fullname }}</td>
        <td>{{ Category::findOrFail($leave->category_id)->name }}</td>
        <td>{{ Task::findOrFail($leave->task_id)->name }}</td>
        <td>{{ $leave->start_date }}</td>
        <td>{{ $leave->end_date }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@else
<br><h6>no data to show</h6>
@endif
<!-- //////////////////////////////////////////////////// -->
<br>
<h2>History</h2>

@if (count($history)>0)
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
      
      <td>{{ User::findOrFail($leave->user_id)->fullname }}</td>
        <td>{{ User::findOrFail($leave->substitute_id)->fullname }}</td>
        <td>{{ Category::findOrFail($leave->category_id)->name }}</td>
        <td>{{ Task::findOrFail($leave->task_id)->name }}</td>
        <td>{{ $leave->start_date }}</td>
        <td>{{ $leave->end_date }}</td>
        <td>{{ $leave->status }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@else
<br><h6>no data to show</h6>
@endif
@endsection