<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.doctor.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->ValidateStore($request);
        $data = $request->all();

        $image = $request->file('image');
        $name = $image->hashName();
        $destination = public_path('/images');
        $image->move($destination, $name);

        $data['image'] = $name;
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->back()->with('message', 'Doctor successfully added.');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'showwww';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.doctor.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validateUpdate($request, $id);
        $data = $request->all();
        $user = User::find($id);
        $imageName = $user->image;
        $userPassword = $user->password;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->hashName();
            $destination = public_path('/images');
            $image->move($destination, $imageName);
        }
        $data['image'] = $imageName;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $userPassword;
        }

        $user->update($data);
        return redirect()->route('doctor.index')->with('message', 'Doctor successfully updated.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(string $id)
    {
        //
    }

    public
    function validateStore($request)
    {
        return $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:25',
            'gender' => 'required',
            'education' => 'required',
            'address' => 'required',
            'department' => 'required',
            'phone_number' => 'required|numeric',
            'image' => 'required|mimes:jpeg,jpg,png',
            'role_id' => 'required',
            'description' => 'required'

        ]);
    }

    public
    function validateUpdate($request, $id)
    {
        return $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'gender' => 'required',
            'education' => 'required',
            'address' => 'required',
            'department' => 'required',
            'phone_number' => 'required|numeric',
            'image' => 'required|mimes:jpeg,jpg,png',
            'role_id' => 'required',
            'description' => 'required'

        ]);
    }

}
