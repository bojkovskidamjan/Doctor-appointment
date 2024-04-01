@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body table-responsive-sm">
                        <p>Date: {{ $prescription->date }}</p>
                        <p>Patient: {{ $prescription->user->name }}</p>
                        <p>Doctor: {{ $prescription->doctor->name }}</p>
                        <p>Disease: {{ $prescription->name_of_disease }}</p>
                        <p>Symptoms: {{ $prescription->symptoms }}</p>
                        <p>Procedure to use medicine: {{ $prescription->procedure_to_use_medicine }}</p>
                        <p>Feedback: {{ $prescription->feedback }}</p>
                        <p>Doctor's signature: {{ $prescription->signature }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

