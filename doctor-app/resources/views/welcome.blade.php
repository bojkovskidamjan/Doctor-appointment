@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="/banner/doctor-banner.jpg" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2>Create an account & Book your appointment</h2>
                <p>
                    Welcome to our healthcare platform, where patients can effortlessly schedule their next doctor's appointment with just a few clicks, eliminating the hassle of long wait times and phone calls. Our intuitive interface allows doctors to efficiently manage appointments, reach new patients, and communicate securely, all in one convenient location. Say goodbye to administrative headaches and hello to streamlined practice management. Join us today and experience a seamless healthcare connection for both patients and doctors alike.
                </p>
                <div class="mt-5">
                    <a href="{{url('/register')}}"><button class="btn btn-success">Register as Patient</button></a>
                    <a href="{{url('/login')}}"><button class="btn btn-secondary mx-2">Login</button></a>
                </div>
            </div>
        </div>
<hr>
        <!--Search doctors-->
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    Find Doctors
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="date" class="form-control" id="datepicker">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary" type="submit">Find Doctors</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--display doctors-->
        <div class="card">
            <div class="card-body">
                <div class="card-header">Doctors</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Expertise</th>
                            <th>Book</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($doctors as $doctor)
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <img src="{{asset('images')}}/{{$doctor->doctor->image}}" width="100px" style="border-radius: 50%">
                                </td>
                                <td>{{$doctor->doctor->name}}</td>
                                <td>{{$doctor->doctor->department}}</td>
                                <td>
                                    <a href="{{route('create.appointment', [$doctor->user_id, $doctor->date])}}">
                                        <button class="btn btn-success">Book Appointment</button>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <td>No doctors available today.</td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
