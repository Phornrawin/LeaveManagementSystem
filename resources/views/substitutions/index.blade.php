@extends('layouts.user')

@section('main')
<div class="container">
  <h3 class="display-4">Request for substituting</h3>
  <hr>
  <div class="container">
    <table class="table table-hover">
      <thead>
        <tr class="table-primary">
          <th scope="col"></th>
          <th scope="col">Requester</th>
          <th scope="col">Category</th>
          <th scope="col">Task</th>
          <th scope="col">Period</th>
        </tr>
      </thead>
      <tbody>
        @foreach($leaves as $leave)
          <tr class="table-light" onclick="window.location='/substitutions/' + {{ $leave->id }};">
            <td scope="row">{{ $leave->id }}</td>
            <td>{{ $leave->user->firstname . " " . $leave->user->lastname }}</td>
            <td>{{ $leave->category->name }}</td>
            <td>{{ $leave->task->name }}</td>
            <td>
              <?php
              $start = date_create($leave->start_date);
              $end = date_create($leave->end_date);
              echo date_diff($start, $end)->format("%a days");
              ?>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
