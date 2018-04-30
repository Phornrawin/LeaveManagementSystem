@extends('layouts.user')

@section('main')
<?php 
use Illuminate\Support\Facades\DB;
use App\User;
use App\Category;
use App\Task;
?>
<h1>My leave Requests</h1><br>
<h2>Current</h2>
@if (count($current) > 0)
<table class="table table-hover" style="margin-top: 50px">
    <thead>
      <tr class="table-primary">
        <th scope="col">Substitute</th>
        <th scope="col">Category</th>
        <th scope="col">Task</th>
        <th scope="col">Start</th>
        <th scope="col">End</th>
        <th scope="col">Status</th>

        <th scope="col">Cancel</th>
      </tr>
    </thead>
    <tbody>
      @foreach($current as $leave)
      <tr class="table-secondary">
        <td>{{ User::find($leave->substitute_id)->fullname }}</td>
        <td>{{ Category::find($leave->category_id)->name }}</td>
        <td>{{ Task::find($leave->task_id)->name }}</td>
        <td>{{ $leave->start_date }}</td>
        <td>{{ $leave->end_date }}</td>
        <td>{{ $leave->status }}</td>
        <td>
        @if (($leave->status == 'new')||($leave->status == 'wait for approval') )
        <a href="{{ url('/myrequests/' . $leave->id.'/cancel') }}">
            Cancel
          </a>
        @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@else
<br><h6 >no data to show</h6>
@endif
  <!-- /////////////////////////////////////////////////////////////////////// -->
 <br><h2>History</h2>
@if (count($history) >0)
<table class="table table-hover" style="margin-top: 50px">
    <thead>
      <tr class="table-primary">        
        <th scope="col">Substitute</th>
        <th scope="col">Category</th>
        <th scope="col">Task</th>
        <th scope="col">Start</th>
        <th scope="col">End</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($history as $leave)
      <tr class="table-secondary">
        <td>{{ User::find($leave->substitute_id)->fullname }}</td>
        <td>{{ Category::find($leave->category_id)->name }}</td>
        <td>{{ Task::find($leave->task_id)->name }}</td>
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