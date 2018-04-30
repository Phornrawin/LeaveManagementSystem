@extends('layouts.user')

@section('main')
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
        <td>{{ DB::table('users')->where('id',$leave->user_id)->first()->firstname }}</td>
        <td>{{ DB::table('users')->where('id',$leave->substitute_id)->first()->firstname }}</td>
        <td>{{ DB::table('categories')->where('id',$leave->category_id)->first()->name }}</td>
        <td>{{ DB::table('tasks')->where('id',$leave->task_id)->first()->name }}</td>
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