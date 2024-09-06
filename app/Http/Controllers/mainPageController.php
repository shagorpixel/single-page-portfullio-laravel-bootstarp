<?php

namespace App\Http\Controllers;

use App\Models\Main;
use Illuminate\Http\Request;

class mainPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mainSection = Main::first();
        return view('pages.dashboard.main',compact('mainSection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Main $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Main $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Main $id)
    {
        $request->validate([
            'title'=>'required|max:100|min:20',
            'sub_title'=>'required|max:100|min:20'
        ]);


        if($image = $request->file('bg_image')){
            $imageName = uniqid().'-'. uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('upload/img',$imageName);
            $oldImg = 'upload/img/'.$id->bg_image;
            if($id->bg_image != Null){
                if(file_exists($oldImg)){
                    unlink($oldImg);
                }
            }
        }
        else{
            $imageName = $id->bg_img;
        }

        if($resume = $request->file('resume')){
            $pdfName = uniqid().'-'. uniqid().'.'.$resume->getClientOriginalExtension();
            $resume->move('upload/pdf',$pdfName);
            $oldresume = 'upload/pdf/'. $id->resume;
            if($id->resume != Null){
                if(file_exists($oldresume)){
                    unlink($oldresume);
                }
            }
        }else{
            $pdfName = $id->resume;
        }


      $data = [
            'title'=> $request->title,
            'sub_title'=> $request->sub_title,
            'bg_image'=>$imageName,
            'resume'=>$pdfName,
        ];

        $id->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Main $mainSection)
    {
        //
    }
}
