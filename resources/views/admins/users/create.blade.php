@extends("layouts.master")

@section("content")
<br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-12" style="text-align:center">
                <h3><b>Edit Department</b></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="form-group" method="post" action="/admin/users/create">
                    <!-- CSRF: Cross-Site Request Forgery -->
                    <!-- @method("PUT") -->
                    @csrf
                    {{-- csrf_field() --}}
                    <label for="firstname">Firstname:</label>
                    <input id="name" class="form-control" type="text" name="firstname" value="">
                    <label for="lastname">Lastname:</label>
                    <input id="name" class="form-control" type="text" name="lastname" value="">
                    <label for="name">E-mail:</label>
                    <input id="email" class="form-control" type="text" name="email" value="">
                    <label for="password">Password:</label>
                    <input id="password" class="form-control" type="password" name="password" value="">
                    <label for="tel">Tel:</label>
                    <input id="name" class="form-control" type="text" name="tel" value="">
                    <label for="gender">Gender:</label>
                    <div class="input-group mb-3">
                          <select class="custom-select" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                          </select>
                        
                    </div>
                    <label for="department">Department:</label>
                    <div class="input-group mb-3">
                          <select class="custom-select" name="department">
                             @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                          </select>
                        
                    </div>
                    <label for="supervisor">Supervisor:</label>
                    <div class="input-group mb-3">
                          <select class="custom-select" name="supervisor">
                             @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                          </select>
                        
                    </div>
                    <label for="position">Position:</label>
                    <div class="input-group mb-3">
                          <select class="custom-select" name="position">
                             @foreach($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                          </select>
                    </div>
                    <label for="facebook">Facebook:</label>
                    <input id="name" class="form-control" type="text" name="facebook" value="">
                    <label for="line">Line:</label>
                    <input id="name" class="form-control" type="text" name="line" value="">
                    
                    <br>
                    <center>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </center>
                    
                </form>
            </div>
        </div>
    </div>
@endsection