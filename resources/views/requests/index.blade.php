@extends('layouts.user')

@section('main')
{{ $users }}
<table class="table table-hover" style="margin-top: 50px">
    <thead>
      <tr class="table-primary">
        <th scope="col">id</th>
        <th scope="col">user_id</th>
        <th scope="col">substitute_id</th>
        <th scope="col">category_id</th>
        <th scope="col">task_id</th>
        <th scope="col">start</th>
        <th scope="col">end</th>
        <!-- <th scope="col">status</th> -->
      </tr>
    </thead>
    <tbody>
      @foreach($leaves as $leave)
      <tr class="table-secondary">
      
        <td scope="row">
            {{ $leave->id }}
        </td>
        <td>
          
            {{ $leave->user_id  }}
          
        </td>
        <td>{{ $leave->substitute_id }}</td>
        <td>{{ $leave->category_id }}</td>
        <td>{{ $leave->task_id }}</td>
        <td>{{ $leave->start_date }}</td>
        <td>{{ $leave->end_date }}</td>
        <!-- <td>{{ $leave->status }}</td> -->
        <td>
        <a href="{{ url('/leaves/' . $leave->id) }}">
            View
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>



@endsection