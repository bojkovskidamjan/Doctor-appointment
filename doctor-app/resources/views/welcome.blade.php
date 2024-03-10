@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="/banner/doctor-banner.jpg" class="img-fluid" style="border:1px solid #ccc; ">
            </div>
            <div class="col-md-6">
                <h2>Create an account & Book your appointment</h2>
                <p>
                    Lorem ipsum
                </p>
                <div class="mt-5">
                    <button class="btn btn-success">Register as Patient</button>
                    <button class="btn btn-secondary">Login</button>
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
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <img src="/doctor/doctor.jpg" width="100px" style="border-radius: 50%">
                            </td>
                            <td>Name of doctor</td>
                            <td>Cardiologist</td>
                            <td>
                                <button class="btn btn-success">Book Appointment</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
