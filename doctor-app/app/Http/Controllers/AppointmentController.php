<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Time;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'date'=>'required|unique:appointments,date,NULL,id,user_id,'.\Auth::id(),
           'time'=>'required'
        ]);
        $appointment = Appointment::create([
            'user_id' => auth()->user()->id,
            'date' => $request->date
        ]);
        foreach ($request->time as $time){
            Time::create([
                'appointment_id'=>$appointment->id,
                'time'=>$time,
            ]);
        }
        return redirect()->back()->with('message','Appointment created for '. $request->date);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
