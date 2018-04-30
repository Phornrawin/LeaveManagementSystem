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
	              <a class="dropdown-item" href="/admin/users/create">Create users</a>
	              <a class="dropdown-item" href="/admin/users/view">View all users</a>
	 
	        </li>
	        <a class="nav-link"  href="/admin/categories/view" role="tab"  aria-selected="false">Categories</a>
	    </div>
	</div>
	<div class="col-md-9" style="margin: 10px">
		<h2>All Department</h2>
		<hr>
		<br>
		<center>
			<form class="form-inline" action="/admin/departments/view" method="post">
				@csrf
			  <div class="form-row align-items-center">
			    	<h4 style="margin: 5px">Create department : </h4>
				      <label class="sr-only" for="inlineFormInput">Create department</label>
				      <input type="text" name="name" style="margin: 5px" class="form-control " id="inlineFormInput" placeholder="departname's name...">
				      <button type="submit" style="margin: 5px" class="btn btn-primary mb-2">Submit</button>
			  </div>
	
			</form>
		</center>
		<br>
		<!-- Department table -->
		

	<div class="contrainer">
		 <table class="table table-hover table-bordered table-striped">
	    <thead>
	      <tr>
	        <th>id</th>
	        <th>Department's name</th>
	      </tr>
	    </thead>
	    <tbody> 
	    	@foreach($departments as $department)
	    	<tr>
	    		<th scope="row">{{ $loop->iteration }}</th>
			        <td>
			          <a>
			            {{ $department->name }}
			          </a>
			        </td>
			        <td>
			            <a href="/admin/departments/{{$department->id}}/edit" class="btn btn-warning" role="button">Edit</a>
			        </td>
			        <td>
			             <form style="margin:0px" name="name" action="/admin/departments/{{ $department->id }}" method="post">
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
</div>


@endsection