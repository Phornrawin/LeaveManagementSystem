@extends('layouts.user')

@section('main')

<div class="container">
  <div class="card mb-3"  >
    <div class="card-body row">

      <div class="col-sm-8" background="#ff6666">
        <h4 class="display-4"> {{ $leave->substitute()->first()->fullName }}</h4><br>
        <h5>Category:{{ "  ".$leave->category()->first()->name }}</h5><br>
        <h5>Task:{{ "  ".$leave->task()->first()->name }}</h5><br>
        <h5>Period:{{ "  ".$leave->start_date ." to ". $leave->end_date }}</h5><br>

        <h5>Status:{{ "  ".$leave->status }}</h5>
      </div>
    </div>
  </div>
</div>





        @if ($leave->status == 'wait for approval' and $me == $super  )
        <a class="btn btn-primary" href="{{ url('/requests/' . $leave->id) .'/approved'}}" >Approved</a>
        <a class="btn btn-primary" href="{{ url('/requests/' . $leave->id) .'/rejected'}}" >Rejected</a>
        @endif


@endsection