<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Team::all();
        return view('pages.dashboard.team.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:30',
            'image'=>'required',
            'title'=>'required',
        ]);

        $imageName = null;
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('upload/img',$imageName);
        }
        $data =[
            'name'=>$request->name,
            'title'=>$request->title,
            'image'=>$imageName,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'linkedin'=>$request->linkedin,
        ];
        Team::create($data);
        return redirect()->back()->with('status','Member Created Successfull.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('pages.dashboard.team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name'=>'required|max:30',
            'title'=>'required',
        ]);


        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('upload/img',$imageName);
            $oldImage = 'upload/img/'.$team->image;
            if($team->image != null){
                if(file_exists($oldImage)){
                    unlink($oldImage);
                };
            }
        }else{
            $imageName = $team->image;
        }
        $data =[
            'name'=>$request->name,
            'title'=>$request->title,
            'image'=>$imageName,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'linkedin'=>$request->linkedin,
        ];
        $team->update($data);
        return redirect()->back()->with('status','Member Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->back()->with('status','Member Delete Successfully');
    }
}
