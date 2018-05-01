<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        return view('profiles.index', compact('user'));
    }

    public function edit() {
        $user = Auth::user();
        return view('profiles.edit', compact('user'));
    }
    
    public function update(Request $request) {
        // return $request;
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'tel' => 'nullable|numeric|regex:/(0)[8-9][0-9]{8}/',
            'line' => 'nullable',
            'facebook' => 'nullable',
        ]);
        $user = Auth::user();
        $user->tel = $request->tel;
        $user->facebook = $request->facebook;
        $user->line = $request->line;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $new_name = $user->id.".".$extension;
            $image->storeAs('public/profile_images', $new_name);
            $user->image = $new_name;
        }
        $user->save();
        return redirect('/');
    }
}
