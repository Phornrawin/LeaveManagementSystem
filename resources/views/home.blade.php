@extends('layouts.app')

@section('content')
 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li class=&quot;active&quot;>
                            <a href="http://demo.startlaravel.com/sb-admin-laravel"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li >
                            <a href="http://demo.startlaravel.com/sb-admin-laravel/charts"><i class="fa fa-bar-chart-o fa-fw"></i> Charts</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li >
                            <a href="http://demo.startlaravel.com/sb-admin-laravel/tables"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li >
                            <a href="http://demo.startlaravel.com/sb-admin-laravel/forms"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        <li >
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li >
                                    <a href="http://demo.startlaravel.com/sb-admin-laravel/panels">Panels and Collapsibles</a>
                                </li>
                                <li >
                                    <a href="http://demo.startlaravel.com/sb-admin-laravel/buttons">Buttons</a>
                                </li>
                                <li >
                                    <a href="http://demo.startlaravel.com/sb-admin-laravel/notifications">Alerts</a>
                                </li>
                                <li >
                                    <a href="http://demo.startlaravel.com/sb-admin-laravel/typography">Typography</a>
                                </li>
                                <li >
                                    <a href="http://demo.startlaravel.com/sb-admin-laravel/icons"> Icons</a>
                                </li>
                                <li >
                                    <a href="http://demo.startlaravel.com/sb-admin-laravel/grid">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li >
                                    <a href="http://demo.startlaravel.com/sb-admin-laravel/blank">Blank Page</a>
                                </li>
                                <li>
                                    <a href="http://demo.startlaravel.com/sb-admin-laravel/login">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li >
                            <a href="http://demo.startlaravel.com/sb-admin-laravel/documentation"><i class="fa fa-file-word-o fa-fw"></i> Documentation</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
