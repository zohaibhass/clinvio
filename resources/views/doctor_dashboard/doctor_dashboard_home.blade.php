@extends('doctor_dashboard/doctors_layout')
@section('title','doctor dashboard')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Doctors Dashboard</h1>

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4 text-center">
                        <div class="card-body"><h5 class=" badge text-bg-danger">Approved Appointments {{$confirmedappointments}}</h5>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            {{-- <a class="small text-white stretched-link" href="#">View Details</a> --}}

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body text-center"> <h4 class="badge text-bg-primary">pending Appointments: {{$pendingappointments}}</h4>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            {{-- <a class="small text-white stretched-link" href="#">View Details</a> --}}

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body text-center"><h5 class="badge text-bg-warning">Today's Appointments {{$todaysappointments}}</h5>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            {{-- <a class="small text-white stretched-link" href="#">View Details</a> --}}

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body text-center"><h5 class="badge text-bg-success">Total Appointments  {{$totalappointments}}</h5>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            {{-- <a class="small text-white stretched-link" href="#">View Details</a> --}}

                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-2 mx-3">
                <div>
                    <h3 class="text-center">Recent Appointmets</h3>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">S#no</th>
                            <th scope="col">Patient name</th>
                            <th scope="col">Phone NO</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Age</th>
                            <th scope="col">Description</th>


                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($recentAppointments as $recents )
                            
                        
                        <tr>
                            <th scope="row">{{$recents->Apt_id}}</th>
                            <td>{{$recents->patient->Name}}</td>
                            <td>{{$recents->patient->Phone}}</td>
                            <td>{{$recents->patient->Gender}}</td>
                            <td>{{$recents->patient->Age}}</td>
                            <td>{{$recents->description}}</td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

        </div>
    </main>
@endsection
