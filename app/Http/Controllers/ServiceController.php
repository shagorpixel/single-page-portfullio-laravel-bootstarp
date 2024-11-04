<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('pages.dashboard.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $serviceCategories = ServiceCategory::all();
        return view('pages.dashboard.service.create',compact('serviceCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'image'=>'required',
            'price'=>'required',
            'description'=>'required|min:40',
        ]);

        $imageName = '';

        if($image = $request->file('image')){
            $imageName = time().'-'. uniqid(). '.'. $image->getClientOriginalExtension();
            $image->move('upload/img',$imageName);
        }

        $data = [
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'slug'=>Str::slug($request->title, '-'),
            'image'=>$imageName,
            'price'=>$request->price,
            'description'=>$request->description
        ];
        Service::create($data);
        return redirect()->back()->with('status','Service Created Succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $serviceCategories = ServiceCategory::all();
        return view('pages.dashboard.service.edit',compact('service','serviceCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'description'=>'required|min:40',
        ]);

        $oldImage = 'upload/img/'.$service->image;

        if($image = $request->file('image')){
            $imageName = time().'-'. uniqid(). '.'. $image->getClientOriginalExtension();
            $image->move('upload/img',$imageName);

            if($service->image != null){
                if(file_exists($oldImage)){
                    unlink($oldImage);
                }
            }

        }else{
            $imageName = $service->image;
        }

        $data = [
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'slug'=>Str::slug($request->title, '-'),
            'image'=>$imageName,
            'price'=>$request->price,
            'description'=>$request->description
        ];

        $service->update($data);
        return redirect()->back()->with('status','Service Update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $oldImage = 'upload/img/'.$service->image;
        $service->delete();

        if($service->image != null){
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
        }
        return redirect()->back()->with('status','Service Delete Successfully.');
    }
}
