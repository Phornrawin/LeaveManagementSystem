<?php

namespace App\Http\Controllers\Admins\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Department;
use App\Position;

class UsersController extends Controller
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
        $users = \App\User::all();
        return view('admins.users.view', compact('users'));
    }

    public function create()
    {
        $positions = \App\Position::all();
        $users = \App\User::all();
        $departments = \App\Department::all();
        return view('admins.users.create', compact('positions', 'users', 'departments'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => "required|max:255|min:4",
            'lastname' => "required|max:255|min:4",
            'email' => "required|min:10",

        ]);
        try{
            $user = new User;
            $user->firstname = $request->input("firstname");
            $user->lastname = $request->input("lastname");
            $user->email = $request->input("email");
            $user->password = bcrypt($request->input("password"));
            $user->tel = $request->input("tel");
            $user->gender = $request->input('gender');
            $user->image = null;
            $user->supervisor_id = $request->input('supervisor');
            $user->department_id = $request->input("department");
            $user->position_id = $request->input("position");
            $user->facebook = $request->input("facebook");
            $user->line = $request->input("line");
            $user->is_admin = 0;
            $user->save();
            return redirect("/admin/users/view");
        }catch(Exception $e){
            return back()->withInput();
        }
    }

    public function edit(User $user)
    {
        $departments = \App\Department::all();
        $positions = \App\Position::all();
        return view('admins.users.edit', compact("user", "departments", "positions"));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'firstname' => "required|max:255|min:4|unique:users,firstname,$user->id",
            'lastname' => "required|max:255|min:4|unique:users,lastname,$user->id",
            'email' => "required|min:10",

        ]);
        try{
            $user->firstname = $request->input("firstname");
            $user->lastname = $request->input("lastname");
            $user->email = $request->input("email");
            $user->tel = $request->input("tel");
            $user->department_id = $request->input("department");
            $user->position_id = $request->input("position");
            $user->save();
            return redirect("/admin/users/view");
        }catch(Exception $e){
            return back()->withInput();
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect("/admin/users/view");
    }

}
