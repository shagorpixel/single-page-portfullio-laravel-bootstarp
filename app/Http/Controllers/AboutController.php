<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::orderBy('created_at','DESC')->paginate('20');
        return view('pages.dashboard.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:100',
            'description'=>'required|min:60',
        ]);
        $imageName = '';
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('upload/img/',$imageName);
        }

        $data  = [
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$imageName
        ];
        About::create($data);
        return redirect()->back()->with('status','About Section Create Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('pages.dashboard.about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'title'=>'required|max:100',
            'description'=>'required|min:60',
        ]);

        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('upload/img/',$imageName);

            $oldImage = 'upload/img/'.$about->image;
            if($about->image != null){
                if(file_exists($oldImage)){
                    unlink($oldImage);
                }
            }

        }else{
            $imageName = $about->image;
        }

        $data  = [
            'title'=>$request->title,
            'duration'=>$request->duration,
            'description'=>$request->description,
            'image'=>$imageName
        ];
        $about->update($data);
        return redirect()->back()->with('status','About Section Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        $oldImage = 'upload/img/'.$about->image;
            if($about->image != null){
                if(file_exists($oldImage)){
                    unlink($oldImage);
                }
        }
        $about->delete();
        return redirect()->back()->with('status','About Section Delete Successfully');
    }
}
