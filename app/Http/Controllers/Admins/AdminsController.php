<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if(\Auth::user()->is_admin !== 1)
    		return redirect("/");

        $users = \App\User::all();
        $departments = \App\Department::all();
        return view('admins.index', compact('users', 'departments'));
    }

}
