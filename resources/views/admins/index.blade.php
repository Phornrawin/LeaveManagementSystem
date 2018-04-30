@extends('layouts.app')

@section('content')
<br><br>
<div class="col-2" >
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
         <a class="nav-link active"  href="/admin" aria-selected="true">Home</a>
        <a class="nav-link"  href="/admin/departments/view" aria-selected="false">Departments</a>
        
        <!-- <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Users</a> -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Users
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/admins/users/create">Create users</a>
              <a class="dropdown-item" href="/admins/user/view">View all users</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Delect users</a>
            </div>
        </li>
        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Categories</a>
    </div>
</div>
<div class="col-10">
    <!-- div's Toto -->
</div>




@endsection