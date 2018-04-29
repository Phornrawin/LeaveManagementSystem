@extends('layouts.user')

@section('main')

<div class="container">
  <table class="table table-hover">
    <thead>
      <tr class="table-primary">
        <th scope="col"></th>
        <th scope="col">Name</th>
        <th scope="col">E-mail</th>
        <th scope="col">Position</th>
        <th scope="col">Tel</th>
      </tr>
    </thead>
    <tbody>
      @foreach($subs as $sub)
      <tr class="table-secondary">
        <td scope="row">{{ $sub->id }}</td>
        <td>
          <a href="{{ url('/subs/' . $sub->id) }}">
            {{ $sub->firstname . " " . $sub->lastname }}
          </a>
        </td>
        <td>{{ $sub->email }}</td>
        <td>{{ $sub->position()->first()->name }}</td>
        <td>{{ $sub->tel }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
