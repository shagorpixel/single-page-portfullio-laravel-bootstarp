<?php

namespace App\Http\Controllers;

use App\Models\Portfullio;
use Illuminate\Http\Request;

class PortfullioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfullios = Portfullio::orderBy('created_at','DESC')->paginate(20);
        return view('pages.dashboard.portfullio.index',compact('portfullios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.portfullio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:70 ',
            'sub_title'=>'max:150',
            'image'=>'required',
            'description'=>'required|min:60',
            'client'=>'max:30',
            'category'=>'required|max:30',
        ]);
        $imageName = null;
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images',$imageName);
        }
        $data = [
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            'image'=>$imageName,
            'description'=>$request->description,
            'client'=>$request->client,
            'category'=>$request->category
        ];
        Portfullio::create($data);
        return redirect()->back()->with('status','Portfullio Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfullio $portfullio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfullio $portfullio)
    {
        return view('pages.dashboard.portfullio.edit',compact('portfullio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfullio $portfullio)
    {
        $request->validate([
            'title'=>'required|max:70 ',
            'sub_title'=>'max:150',
            'description'=>'required|min:60',
            'client'=>'max:30',
            'category'=>'required|max:30',
        ]);
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images',$imageName);
            $oldImage = 'images/'.$portfullio->image;
            if($portfullio->image != null){
                if(file_exists($oldImage)){
                    unlink($oldImage);
                }
            }
        }else{
            $imageName = $portfullio->image;
        }
        $data = [
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            'image'=>$imageName,
            'description'=>$request->description,
            'client'=>$request->client,
            'category'=>$request->category
        ];

        $portfullio->update($data);
        return redirect()->back()->with('status','Portfullio Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfullio $portfullio)
    {
        $portfullio->delete();
        return redirect()->back()->with('status','Portfullio Delete Successfully');
    }
}
