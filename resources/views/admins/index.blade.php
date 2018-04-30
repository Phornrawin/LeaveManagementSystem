@push('styles')
    <link href="{{ asset('css/text.css') }}" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('content')
<br><br>
<<<<<<< HEAD
<div class="row">
  <div class="col-2" style="margin: 10px">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
          <!-- <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Departments</a> -->
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Department
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Create department</a>
                <a class="dropdown-item" href="#">View all departments</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Delete department</a>
              </div>
          </li>
          <!-- <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Users</a> -->
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                User
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Create user</a>
                <a class="dropdown-item" href="#">View all users</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Delete user</a>
              </div>
          </li>
          <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Leave</a>
      </div>
  </div>

  <div class="col-9" style="margin: 10px">
      <!-- Head topic shortcut -->
    <div class="topic">
        <p class="main-topic"><a href="#Introduction"># Introduction</a></p>

        <p class="main-topic"><a href="#Admin-Side"># Admin side</a></p>
        <p class="minor-topic"><a href="#Department-Management">Department management</a></p>
        <p class="minor-topic"><a href="#User-Management">User management</a></p>
        <p class="minor-topic"><a href="#Modify-Leave-Rule">Modify leave rule</a></p>

        <p class="main-topic"><a href="#User-Side"># User side</a></p>
        <p class="minor-topic"><a href="#Profile">Profile</a></p>
        <p class="minor-topic"><a href="#Leave-Management">Leave management</a></p>
        <p class="minor-topic"><a href="#Subordinates">Subordinates</a></p>
        <p class="minor-topic"><a href="#Summary">Summary</a></p>

        <br><br>
=======
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
              <a class="dropdown-item" href="/admin/users/create">Create users</a>
              <a class="dropdown-item" href="/admin/users/view">View all users</a>
            </div>
        </li>
        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Categories</a>
>>>>>>> 7f86253a67539d87a14cb66ba2594868439e7dc0
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Introduction -->
        <h3 id="Introduction" class="main-topic jumptarget"># Introduction</h3>
        <p class="explanation">This is web service for organization who want to use system for manage leave system in organization. This site is divided into two parts. The first is the part for admin to manage service system. Admin can create user for members of organization, can create department of organization and can modify leave rules for use in the system. The second is the part for user to use system. User can make leave request to leader. Moreover, user can assign tasks to own subordinates.</p>
        <br>

        <!-- Admin side -->
        <h3 id="Admin-Side" class="main-topic jumptarget"># Admin side</h3>

        <h4 id="Department-Management" class="minor-topic jumptarget">Department management</h4>
        <h5 class="sub-minor-topic">Create department</h5>
        <p class="explanation">Admin can create department for use in organization by click <span class="method">"Department" >> "Create department"</span> button in left menu. Then admin must fill organizational department's information in the box and click "Submit" button.</p>
        <h5 class="sub-minor-topic">View all departments</h5>
        <p class="explanation">Admin can view all departments in the organization by click <span class="method">"Department" >> "View all departments"</span> button in left menu.</p>
        <h5 class="sub-minor-topic">Delete department</h5>
        <p class="explanation">Admin can delete department by click <span class="method">"Department" >> "Delete department"</span> button in left menu. Then choose department that want to delete.</p>


        <h4 id="User-Management" class="minor-topic jumptarget">User management</h4>
        <h5 class="sub-minor-topic">Create user</h5>
        <p class="explanation">Admin can create user for members in organization by click <span class="method">"User" >> "Create User"</span> button in left menu. Then admin must fill user's infomation in the box and click "Submit" button.</p>
        <h5 class="sub-minor-topic">View all users</h5>
        <p class="explanation">Admin can view all user in the organization by click <span class="method">"User" >> "View all users"</span> button in left menu.</p>
        <h5 class="sub-minor-topic">Delete user</h5>
        <p class="explanation">Admin can delete user by click <span class="method">"User" >> "Delete user"</span> button in left menu. Then choose user that want to delete.</p>

        <h4 id="Modify-Leave-Rule" class="minor-topic jumptarget">Modify leave rule</h4>
        <p class="explanation">Admin can modify your organization's leave rule by click <span class="method">"Leave"</span> button in left menu. Then admin must choose rule for organization and click "Submit" button.</p>
        <br>

        <!-- User side -->
        <h3 id="User-Side" class="main-topic jumptarget"># User side</h3>

        <h4 id="Profile" class="minor-topic jumptarget">Profile</h4>
        <p class="explanation">User can see own information on home page and can edit some information by click on edit icon.</p>

        <h4 id="Leave-Management" class="minor-topic jumptarget">Leave management</h4>
        <h5 class="sub-minor-topic">Show all leave</h5>
        <p class="explanation">User can see all of own leaves by click <span class="method">"My Leaves" >> "Show all my leaves"</span> button in left menu.</p>
        <h5 class="sub-minor-topic">Make new leave request</h5>
        <p class="explanation">User can make leaves request by click <span class="method">"My Leaves" >> "Make new leave request"</span> button in left menu. Then fill leave information in the box and submit.</p>
        <h5 class="sub-minor-topic">Show all requests to user</h5>
        <p class="explanation">User can see all requests that have two type. Request for leaves and Request for substituting. User can see Request for leaves by click <span class="method">"Requests to me" >> "Request for leaves"</span> button in left menu and can see Request for substituting by click <span class="method">"Requests to me" >> "Request for substituting"</span> button in left menu. Moreover, user can approve that request.</p>

        <h4 id="Subordinates" class="minor-topic jumptarget">Subordinates</h4>
        <h5 class="sub-minor-topic">Show all user's subordinates</h5>
        <p class="explanation">User can see all user's subordinates information by click <span class="method">"My subordinates" >> "Show all my subordinates"</span> button in left menu.</p>
        <h5 class="sub-minor-topic">Assign tasks</h5>
        <p class="explanation">User can assign task to user's subordinates by click <span class="method">"My subordinates" >> "Assign tasks"</span> button in left menu. Then fill assignment infomation in the box and click "ASSIGN" button.</p>

        <h4 id="Summary" class="minor-topic jumptarget">Summary</h4>
        <p class="explanation">User can see overview of member's leave by click <span class="method">"Summary Of Leave"</span> button in left menu.</p>
    </div>
  </div>
</div>

@endsection