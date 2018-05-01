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
                <img class="text-center card-pic border border-primary" width="200" height="200" src="profile_images/{{ $user->image ?? 'default'.$user->gender.'.png'}}">
            </div>
            <div class="col-12 col-lg-9">
                <h1 class="card-title">{{$user->gender=="male" ? "Mr." : "Ms."}} {{$user->firstname}} {{$user->lastname}}</h1>
                <p class="card-text">Department: {{$user->department ? $user->department->name : 'None'}}</p>
                <p class="card-text">Position: {{$user->position ? $user->position->name : 'None'}}</p>
                @if($user->tel)
                <p class="card-text"><span class="h2"><i class="fas fa-phone-square"></i></span> {{$user->tel}}</p>
                @endif
                <p class="card-text"><span class="h2"><i class="fas fa-envelope"></i></span> {{$user->email}}</p>
                @if($user->line)
                <p class="card-text"><span class="h2"><i class="fab fa-line"></i></span> {{$user->line}}</p>
                @endif
                @if($user->facebook)
                <p class="card-text"><span class="h2"><i class="fab fa-facebook-square"></i></span> {{$user->facebook}}</p>
                @endif
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>
    <hr />
    <div class="card">
        <h5 class="card-header bg-warning">My Recent Leave</h5>
        <div class="card-body">
            @if($user->recentLeave)
                <p class="card-text">Substitute: {{$user->recentLeave->substitute->gender=="male" ? "Mr." : "Ms."}} {{$user->recentLeave->substitute->firstname}} {{$user->recentLeave->substitute->lastname}}</p>
                <p class="card-text">Task: {{$user->recentLeave->task->name}}</p>
                <p class="card-text">Date: {{$user->recentLeave->start_date}} - {{$user->recentLeave->end_date}}</p>
                <p class="card-text">Status: {{$user->recentLeave->status}}</p>
            @else
                <div class="card-body">
                    <p class="card-text">You do not have any leaves.</p>
                    <a href="/myrequests/create" class="btn btn-outline-warning">create new leave request.</a>
                </div>
            @endif
        </div>
    </div>
@endsection