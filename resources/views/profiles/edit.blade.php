
@section('title')
@extends('layouts.user')
Leave Management System - Edit Profile
@endsection

@push('css')
<style>
    .card-pic {
        border-radius: 80px;
        display:block;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 20px;
    }
</style>
@endpush

@push('js')
<script>
    document.getElementById("image").addEventListener('change', function(e) {
        var input = document.getElementById("image")
        
        if (input.files[0]) {
            var reader = new FileReader()
            reader.onload = function(e) {
                
                document.getElementById("preview_image").src = e.target.result
            }
            reader.readAsDataURL(input.files[0])
        }
    }, false)
</script>
@endpush

@section('main')
    <form action="/edit" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{--  @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4>{{$errors->first()}}</h4>
            </div>
        @endif  --}}
        
        <div class="card">
            <h5 class="card-header bg-primary text-white">Profile<a href="/edit" class="float-right text-white"><i class="fas fa-cog"></i></a></h5>
            <div class="card-body row">
                <div class="col-12 col-lg-3 text-center">
                    <img id="preview_image" class="text-center card-pic border border-primary" width="200" height="200" src="profile_images/{{ $user->image ?? 'default'.$user->gender.'.png'}}">
                    <label for="image" class="btn btn-primary text-center">Upload Profile Image</label>
                    <input hidden type="file" id="image" name="image" accept="image/*" />
                    @if($errors->first('image'))
                        <span class="help-block text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <div class="col-12 col-lg-9">
                    <h5 class="card-title">{{$user->gender=="male" ? "Mr." : "Ms."}} {{$user->firstname}} {{$user->lastname}}</h5>
                    <p class="card-text">Department: {{$user->department ? $user->department->name : 'None'}}</p>
                    <p class="card-text">Position: {{$user->position ? $user->position->name : 'None'}}</p>
                    <p class="card-text">E-mail: {{$user->email}}</p>
                    <div class="form-group">
                        <label for="tel" class="card-text">Tel: &nbsp;<input class="form-control {{ ($errors->first('tel') ? 'is-invalid' : '') }}" type="tel" name="tel" id="tel" value="{{ old('tel') ?? $user->tel }}" /></label>
                        @if($errors->first('tel'))
                            <span class="help-block text-danger">{{ $errors->first('tel') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="line" class="card-text">Line: &nbsp;<input class="form-control {{ ($errors->first('line') ? 'is-invalid' : '') }}" type="text" name="line" id="line" value="{{ old('line') ?? $user->line }}" /></label>
                        @if($errors->first('line'))
                            <span class="help-block text-danger">{{ $errors->first('line') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="facebook" class="card-text">Facebook: &nbsp;<input class="form-control {{ ($errors->first('facebook') ? 'is-invalid' : '') }}" type="text" name="facebook" id="facebook" value="{{ old('facebook') ?? $user->facebook }}" /></label>
                        @if($errors->first('facebook'))
                            <span class="help-block text-danger">{{ $errors->first('facebook') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="/" class="btn btn-danger text-white float-right">Cancel</a>
                <label for="submit" class="btn btn-success text-white float-left">Save</label>
                <input hidden type="submit" id="submit" value="submit" />
            </div>
        </div>
    </form>
@endsection