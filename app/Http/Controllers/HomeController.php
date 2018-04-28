<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        return view('profiles.index');
    }

    public function edit() {
        $user = Auth::user();
        return view('profiles.edit', $user);
    }
    
    public function update(Request $request) {
        $user = Auth::user();
        $user->tel = $request->tel;
        $user->facebook = $request->facebook;
        $user->line = $request->line;
        $user->save();
        return redirect('/');
    }
}
