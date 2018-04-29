<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $user = \Auth::user();
        return view('admins.index', compact('user'));
    }

//     public function edit() {
//         $user = Auth::user();
//         return view('profiles.edit', compact('user'));
//     }
    
//     public function update(Request $request) {
//         $user = Auth::user();
//         $user->tel = $request->tel;
//         $user->facebook = $request->facebook;
//         $user->line = $request->line;
//         $user->save();
//         return redirect('/');
//     }
}
