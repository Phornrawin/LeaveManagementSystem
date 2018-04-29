@extends('layouts.user')

@section('title')
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
    $('#image').on('change', function(e) {
        var input = this
        if (input.files[0]) {
            var reader = new FileReader()
            reader.onload = (e) => {
                $('#preview_image').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0])
        }
    })
</script>
@endpush

@section('main')
    <form action="/edit" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4>{{$errors->first()}}</h4>
            </div>
        @endif
        
        <div class="card">
            <h5 class="card-header bg-primary text-white">Profile<a href="/edit" class="float-right text-white"><i class="fas fa-cog"></i></a></h5>
            <div class="card-body row">
                <div class="col-12 col-lg-3 text-center">
                    <img id="preview_image" class="text-center card-pic border border-primary" width="200" height="200" src="profile_images/{{ $user->image ?? 'default'.$user->gender.'.png'}}">
                    <label for="image" class="btn btn-primary text-center">Upload Profile Image</label>
                    <input hidden type="file" id="image" name="image" accept="image/*" />
                </div>
                <div class="col-12 col-lg-9">
                    <h5 class="card-title">{{$user->gender=="male" ? "Mr." : "Ms."}} {{$user->firstname}} {{$user->lastname}}</h5>
                    <p class="card-text">Department: {{$user->department ? $user->department->name : 'None'}}</p>
                    <p class="card-text">Position: {{$user->position ? $user->position->name : 'None'}}</p>
                    <p class="card-text">E-mail: {{$user->email}}</p>
                    <div class="form-group"><label for="tel" class="card-text">Tel: &nbsp;<input class="form-control" type="tel" name="tel" id="tel" value="{{ old('tel') ?? $user->tel }}" /></label></div>
                    <div class="form-group"><label for="line" class="card-text">Line: &nbsp;<input class="form-control" type="text" name="line" id="line" value="{{ old('line') ?? $user->line }}" /></label></div>
                    <div class="form-group"><label for="facebook" class="card-text">Facebook: &nbsp;<input class="form-control" type="text" name="facebook" id="facebook" value="{{ old('facebook') ?? $user->facebook }}" /></label></div>
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