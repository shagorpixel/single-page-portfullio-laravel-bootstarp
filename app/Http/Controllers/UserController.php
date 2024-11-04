<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at','desc')->paginate(5);
        return view('pages.dashboard.User.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.User.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:40',
            'email' => ['required','unique:users']
        ]);
        $imageName = '';
        if($image =  $request->file('image')){
            $imageName = time().'-'. uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('upload/img',$imageName);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'description' => $request->description,
            'image' => $imageName,
        ];
        User::create($data);
        return back()->with('status','User Create Succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.dashboard.User.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:40',
            'email' => ['required']
        ]);
        if($image =  $request->file('image')){
            $imageName = time().'-'. uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('upload/img',$imageName);
            $path = 'upload/img/'.$user->image;

            if($user->image != null){
                if(file_exists($path)){
                    unlink($path);
                }
            }
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'description' => $request->description,
            'image' => $imageName,
        ];
        $user->update($data);
        return back()->with('status','User Update Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('status','User Delete Succesfully.');
    }
}
