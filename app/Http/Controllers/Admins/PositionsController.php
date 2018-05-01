<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Position;

class PositionsController extends Controller
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
        $positions = \App\Position::all();
        return view('admins.positions.view', compact('positions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:4'
        ]);
        try{
            $position = new Position;
            $position->name = $request->input("name");
            $position->save();
            return redirect("/admin/positions/view");
        }catch(Exception $e){
            return back()->withInput();
        }
    }

    public function edit(Position $position)
    {
        return view('admins.positions.edit', compact("position"));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $validatedData = $request->validate([
            'name' => "required|max:255|min:4|unique:positions,name,$position->id"
        ]);
        try{
            $position->name = $request->input("name");
            $position->save();
            return redirect("/admin/positions/view");
        }catch(Exception $e){
            return back()->withInput();
        }
    }

    public function destroy(Position $position)
    {
        $position->delete();
        return redirect("/admin/positions/view");
    }

}
