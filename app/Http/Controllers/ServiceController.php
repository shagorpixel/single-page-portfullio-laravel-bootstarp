<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

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
        return view('pages.dashboard.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'icon'=>'required',
            'description'=>'required|min:40',
        ]);

        $data = [
            'name'=> $request->name,
            'icon'=> $request->icon,
            'description'=> $request->description,
        ];
        Service::create($data);
        $request->session()->flash('status','Service Created Successfully.');
        return redirect()->back();
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
        return view('pages.dashboard.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name'=>'required',
            'icon'=>'required',
            'description'=>'required|min:40',
        ]);

        $data = [
            'name'=> $request->name,
            'icon'=> $request->icon,
            'description'=> $request->description,
        ];

        $service->update($data);
        return redirect()->back()->with('status','Service Update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->back()->with('status','Service Delete Successfully.');
    }
}
