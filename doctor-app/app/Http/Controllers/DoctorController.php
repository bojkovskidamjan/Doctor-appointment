<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //3 vo slucajov e patient
        $users = User::where('role_id', '!=', 3)->get();
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
        $name = (new User)->userAvatar($request);


        $data['image'] = $name;
        $data['password'] = bcrypt($request->password);
        User::create($data);

//        return redirect()->back()->with('message', 'Doctor successfully added.');
        // return view('admin.doctor.index');
        return redirect()->route('doctors.index')->with('message', 'Doctor added successfully!');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return view('admin.doctor.delete', compact('user'));
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
            $imageName = (new User)->userAvatar($request);

        }
        $data['image'] = $imageName;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $userPassword;
        }

        $user->update($data);
        // return redirect()->route('doctor.index')->with('message', 'Doctor successfully updated.');
        return redirect('/doctors')->with('flash_message', 'Doctor successfully updated.!');

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
//        auth()->user()->id == $id
        $user = User::find($id);
        if (!$user) {
            abort(401);
        }
        $userDelete = $user->delete();
        if ($userDelete) {
            unlink(public_path('images/' . $user->image));
        }
        return redirect()->route('doctors.index')->with('message', 'Doctor deleted successfully');

    }


//    public function destroy($id)
//    {
//        $user = User::find($id);
//
//        if ($user) {
//            $user->delete();
//
//            return redirect()->route('/doctors')->with('message', 'Doctor deleted successfully');
//        }
//    }
//        } else {
//            return abort(401);
//        }
//    }


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
