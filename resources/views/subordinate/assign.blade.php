@extends('layouts.user')

@section('main')
<div class="container">
  <h3 class="display-4">Assign tasks</h3>
  <hr>
  <div class="container">

    @if ($errors->any())
    <div class="alert alert-danger" style="width: 40%">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <div class="card mb-3">
      <div class="card-body">
        <form action="/subs/assign/" method="post">
          @csrf
          <div class="form-group">
            <label for="name-input">Task Name</label>
            <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="name-input" placeholder="Enter Task Name">
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="select-assign">Assign To</label>
                <select name="mode" class="form-control" id="select-assign" onchange="changed(this);">
                  <script>

                  function changed(e) {
                    window["display_" + e.options[e.selectedIndex].value]();
                  }

                  function display_all() {
                    document.getElementById('div-position').style.display = 'none';
                    document.getElementById('div-person').style.display = 'none';
                  }

                  function display_pos() {
                    document.getElementById('div-position').style.display = 'block';
                    document.getElementById('div-person').style.display = 'none';
                  }

                  function display_spec() {
                    document.getElementById('div-position').style.display = 'none';
                    document.getElementById('div-person').style.display = 'block';
                  }

                  </script>
                  <option value="all" selected>All Subordinates</option>
                  <option value="pos">Specify Position</option>
                  <option value="spec">Specify Person</option>
                </select>
              </div>
            </div>
            <div class="col-sm-4" id="div-position" style="display: none">
              <label for="select-position">Position</label>
              <select name="position" class="form-control" id="select-position">
                @foreach($positions as $position)
                @if(old('positions') == $position->name)
                <option value="{{ $position->name }}" selected>{{ $position->name }}</option>
                @else
                <option value="{{ $position->name }}">{{ $position->name }}</option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="col-sm-4" id="div-person" style="display: none">
              <label for="select-person">Person</label>
              <select name="sub-id" class="form-control" id="select-person">
                @foreach($subs as $sub)
                @if(old('subs') == $sub->firstname . " " . $sub->lastname)
                <option value="{{ $sub->id }}" selected>{{ $sub->firstname . " " . $sub->lastname }}</option>
                @else
                <option value="{{ $sub->id }}">{{ $sub->firstname . " " . $sub->lastname }}</option>
                @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3"></div>
            <div class="col-sm-3"></div>
            <div class="text-right col-sm-3">
              <button class="btn btn-lg btn-primary" type="submit">ASSIGN</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

@endsection
