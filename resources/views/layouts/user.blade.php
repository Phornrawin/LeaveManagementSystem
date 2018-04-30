@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
            <div class="list-group">
                <a href="/" class="list-group-item list-group-item-action">Home</a>
                <a id="collapseLeaveBtn" class="list-group-item list-group-item-action collapsed" data-toggle="collapse" data-target="#collapseLeave" aria-expanded="false" aria-controls="collapseLeave">My Leaves  <i class="fas fa-caret-down"></i><span class="badge badge-pill badge-success float-right"> 1 </span></a>
                <div id="collapseLeave" class="collapse" aria-labelledby="#collapseLeaveBtn">
                    <a href="/myrequests" class="list-group-item list-group-item-action bg-light">Show all my leaves</a>
                    <a href="/myrequests/create" class="list-group-item list-group-item-action bg-light">Make new leave request</a>
                </div>
                <a class="list-group-item list-group-item-action collapsed" data-toggle="collapse" data-target="#collapseRequests" aria-expanded="false" aria-controls="collapseRequests">Requests to me <i class="fas fa-caret-down"></i><span class="badge badge-pill badge-success float-right"> 3 </span></a>
                <div id="collapseRequests" class="collapse">
                    <a href="/requests" class="list-group-item list-group-item-action bg-light">Request for leaves</a>
                    <a href="/substitutions" class="list-group-item list-group-item-action bg-light">Request for substitutions</a>
                </div>
                <a class="list-group-item list-group-item-action collapsed" data-toggle="collapse" data-target="#collapseSub" aria-expanded="false" aria-controls="collapseSub">My subordinates <i class="fas fa-caret-down"></i></a>
                <div id="collapseSub" class="collapse">
                    <a href="/subs" class="list-group-item list-group-item-action bg-light">Show all my subordinates</a>
                    <a href="/subs/assign" class="list-group-item list-group-item-action bg-light">Assign tasks</a>
                </div>
                <a href="/summary" class="list-group-item list-group-item-action">Summary</a>
            </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
            @yield('main')
        </div>
    </div>
@endsection
