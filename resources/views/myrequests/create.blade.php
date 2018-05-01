@extends('layouts.user')

@section('title')
Create Request - Leave Management System
@endsection

@section('main')
<div class="container">
  <h3 class="display-4">Make new leave request</h3>
  <hr>
  <div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <div class="card mb-3">
      <div class="card-body">
        <form action="/myrequests/create" method="post">
          @csrf
          <div class="row">
            <div class="col-sm-4" id="div-category">
              <label for="select-category">Select Category</label>
              <select name="category_id" class="form-control" id="select-category">
                <option value="" selected disabled hidden>Choose here</option>
                @foreach($categories as $category)
                @if(old('category') == $category->name)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                @endforeach
              </select>
              <span id="category_detail" class="text-danger" style="display:none">You have <span id="day_left"></span> days for this leave.</span>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-4" id="div-substitute">
              <label for="select-substitute">Select Substitute</label>
              <select name="substitute_id" class="form-control" id="select-substitute">
                <option value="" selected disabled hidden>Choose here</option>
                @if(count($users)==0)
                  @foreach(\Auth::user()->supervisor->subordinates as $user)
                    @if($user->id==\Auth::user()->id)
                    @elseif(old('user') == $user->fullName)
                    <option value="{{ $user->id }}" selected>{{ $user->fullName }}</option>
                    @else
                    <option value="{{ $user->id }}">{{ $user->fullName }}</option>
                    @endif
                  @endforeach
                @else
                  @foreach($users as $user)
                    @if(old('user') == $user->fullName)
                    <option value="{{ $user->id }}" selected>{{ $user->fullName }}</option>
                    @else
                    <option value="{{ $user->id }}">{{ $user->fullName }}</option>
                    @endif
                  @endforeach
                @endif
              </select>
            </div>
            <div class="col-sm-4" id="div-task">
              <label for="select-task">Select Task</label>
              <select name="task_id" class="form-control" id="select-task">
                <option value="" selected disabled hidden>Choose here</option>
                @foreach($tasks as $task)
                @if(old('task') == $task->name)
                <option value="{{ $task->id }}" selected>{{ $task->name }}</option>
                @else
                <option value="{{ $task->id }}">{{ $task->name }}</option>
                @endif
                @endforeach
              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-4">
              <label for="input-start">Start Date</label>
              <input name="start_date" class="form-control" type="date" id="input-start">
            </div>
            <div class="col-sm-4">
              <label for="input-start">End Date</label>
              <input name="end_date" class="form-control" type="date" id="input-end">
            </div>
          </div>
          <br><br>
          <div class="row">
            <div class="col-md-8"></div>
            <div class="col-sm-4 text-right ">
              <button type="submit" class="btn btn-primary" style="font-size: 26px"><i class="far fa-plus-square"></i>&nbsp;SUBMIT</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
var today = new Date();
var dd = today.getDate() + 1;
var mm = today.getMonth() + 1;
var yyyy = today.getFullYear();
if (dd < 10) {
  dd = '0' + dd;
}
if (mm < 10) {
  mm = '0' + mm;
}
today = yyyy + '-' + mm + '-' + dd;
document.getElementById("input-start").setAttribute("min", today);
document.getElementById("input-start").addEventListener('change', function() {
  document.getElementById("input-end").value = null;
  if (document.getElementById("input-start").value) {
    document.getElementById("input-end").min = document.getElementById("input-start").value;
    let tmpDate = new Date(document.getElementById("input-start").value)
    
    tmpDate.setDate(tmpDate.getDate() + max -1);
    
    var dd = tmpDate.getDate();
    var mm = tmpDate.getMonth() + 1;
    var yyyy = tmpDate.getFullYear();
    if (dd < 10) {
      dd = '0' + dd;
    }
    if (mm < 10) {
      mm = '0' + mm;
    }
    tmpDate = yyyy + '-' + mm + '-' + dd; 
    
    document.getElementById("input-end").max = tmpDate;
  }
}, false);
</script>
@endsection

@push('js')
<script>
    var days = {{str_replace('"', '', json_encode($days))}}
    var max = 0;
    document.getElementById("select-category").addEventListener('change', function(e) {
      id = e.target.value
      max = days[id]
      document.getElementById("day_left").innerHTML = max
      document.getElementById("category_detail").style.display = 'block';
      document.getElementById("input-end").value = null;
      document.getElementById("input-start").value = null;
    }, false)
</script>
@endpush