<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class PatientListController extends Controller
{
    public function index(Request $request)
    {
        date_default_timezone_set('Europe/Skopje');
        if ($request->date) {
            $bookings = Booking::latest()->where('date', $request->date)->get();
            return View('admin.patientList.index', compact('bookings'));
        }
        $bookings = Booking::latest()->where('date', date('Y-m-d'))->get();
        return View('admin.patientList.index', compact('bookings'));
    }

    public function toggleStatus($id)
    {
        $booking = Booking::find($id);
        $booking->status = !$booking->status;
        $booking->save();
        return redirect()->back();
    }

    public function allTimeAppointments()
    {
        $bookings = Booking::latest()->paginate(15);
        return View('admin.patientList.all', compact('bookings'));
    }
}
