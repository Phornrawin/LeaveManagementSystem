@extends('layouts.app')

@section('content')
<br><br>
<div class="row">
	<div class="col-2" style="margin: 10px" >
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
	        <a class="nav-link" href="#" role="tab"  aria-selected="false">Categories</a>
	    </div>
	</div>
	<div class="col-md-9" style="margin: 10px">
		<h2>All User</h2>
		<hr>
		<br>
		<div class="contrainer">
		 <table class="table table-hover table-bordered table-striped">
	    <thead>
	      <tr>
	        <th>id</th>
	        <th>Frist name</th>
	        <th>Last name</th>
	        <th>E-mail</th>
	        <th>Gender</th>
	        <th>Tel</th>
	        <th>Department</th>
	        <th>Position</th>
	      </tr>
	    </thead>
	    <tbody> 
	    	@foreach($users as $user)
	    	<tr>
	    		<th scope="row">{{ $loop->iteration }}</th>
			        <td>
			          <a>
			            {{ $user->firstname}}
			          </a>
			        </td>
			        <td>
			          <a>
			            {{ $user->lastname }}
			          </a>
			        </td>
			        <td>
			          <a>
			            {{ $user->email}}
			          </a>
			        </td>
			        <td>
			          <a>
			            {{ $user->gender }}
			          </a>
			        </td>
			        <td>
			          <a>
			            {{ $user->tel }}
			          </a>
			        </td>
			        <td>
			          <a>
			            {{ $user->department ? $user->department->name : "None" }}
			          </a>
			        </td>
			        <td>
			          <a>
			            {{ $user->position ? $user->position->name : "None" }}
			          </a>
			        </td>
			        <td>
			            <a href="/admins/users/{{$user->id}}/edit" class="btn btn-warning" role="button">Edit</a>
			        </td>
			        <td>
			             <form style="margin:0px" name="name" action="/admin/users/{{ $user->id }}" method="post">
			                @csrf
			                @method("DELETE")
			                <button class="btn btn-danger" role="button" type="summit">Delete</button>            
			              </form>
          			</td>
	    	</tr>
	    	 @endforeach
	    </tbody>
	  </table>
	</div>

	
	</div>

@endsection