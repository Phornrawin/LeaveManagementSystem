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
                <form class="form-group" method="post" action="/admin/users/{{ $user->id }}">
                    <!-- CSRF: Cross-Site Request Forgery -->
                    @method("PUT")
                    @csrf
                    {{-- csrf_field() --}}
                    <label for="firstname">Firstname:</label>
                    <input id="name" class="form-control" type="text" name="firstname" value="{{ old('name') ?? $user->firstname }}">
                    <label for="lastname">Lastname:</label>
                    <input id="name" class="form-control" type="text" name="lastname" value="{{ old('name') ?? $user->lastname }}">
                    <label for="name">E-mail:</label>
                    <input id="email" class="form-control" type="text" name="email" value="{{ old('name') ?? $user->email }}">
                    <label for="tel">Tel:</label>
                    <input id="name" class="form-control" type="text" name="tel" value="{{ old('name') ?? $user->tel }}">
                    <label for="department">Department:</label>
                    <div class="input-group mb-3">
                          <select class="custom-select" name="department">
                             @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
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
                    <!-- <input id="name" class="form-control" type="text" name="tel" value="{{ old('name') ?? $user->tel }}"> -->
                    <!-- <label for="name">Position:</label>
                    <input id="name" class="form-control" type="text" name="tel" value="{{ old('name') ?? $user->tel }}"> -->
                    <!-- <select name="status" id=""></select> -->
                    <br>
                    <center>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </center>
                    
                </form>
            </div>
        </div>
    </div>
@endsection