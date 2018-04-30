@extends('layouts.user')

@section('main')

<div class="container">
  <h3 class="display-4">My Subordinates</h3>
  <hr>
  <div class="container">
    @if (count($subs) == 0)
    <h3 class="display-5 text-muted text-center mt-5">You don't have subordinate<h3>
    @else
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
        <tr class="table-light" onclick="window.location='/subs/' + {{ $sub->id }}">
          <td scope="row">{{ $sub->id }}</td>
          <td>
            <a>
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
    @endif
  </div>
</div>

@endsection
