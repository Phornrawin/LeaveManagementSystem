@extends('layouts.user')

@section('title')
Leave Management System
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

@section('main')
    <div class="card">
        <h5 class="card-header bg-primary text-white">Profile<a href="/edit" class="float-right text-white"><i class="fas fa-cog"></i></a></h5>
        <div class="card-body row">
            <div class="col-12 col-lg-3">
                <img class="text-center card-pic border border-primary" width="200" height="200" src="storage/profile_images/default{{$user->gender}}.png" alt="Card image cap">
            </div>
            <div class="col-12 col-lg-9">
                <h5 class="card-title">{{$user->gender=="male" ? "Mr." : "Ms."}} {{$user->firstname}} {{$user->lastname}}</h5>
                <p class="card-text">Department: {{$user->department ? $user->department->name : 'None'}}</p>
                <p class="card-text">Position: {{$user->position ? $user->position->name : 'None'}}</p>
                <p class="card-text">E-mail: {{$user->email}}</p>
                <p class="card-text">Tel: {{$user->tel}}</p>
                <p class="card-text">Line: {{$user->line}}</p>
                <p class="card-text">Facebook: {{$user->facebook}}</p>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection