<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Europe/Skopje');
        $bookings = Booking::where('date', date('Y-m-d'))->where('status', 1)->where('doctor_id', auth()->user()->id)->get();
        return view('admin.prescription.index', compact('bookings'));
    }

    public function show($userId, $date)
    {
        $prescription = Prescription::where('user_id', $userId)->where('date', $date)->first();
        return view('admin.prescription.show', compact('prescription'));
    }

    public function patientsFromPrescription()
    {
        $patients = Prescription::get();
        return view('admin.prescription.all', compact('patients'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['medicine'] = implode(',', $request->medicine);
        Prescription::create($data);
        return redirect()->back()->with('message', 'Prescription created');
    }
}
