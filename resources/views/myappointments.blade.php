@extends('layouts.layout_landingpage')
@section('title',"myappontments")
@section('content')
    <div  class=" container white_box mb_30 mb-2">
        <div class="box_header ">
            <div class="main-title text-center">
                <h3 class="mb- my-5">Appointments</h3>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Day</th>
                    <th scope="col">Time</th>
                    <th scope="col">Date</th>
                    <th scope="col">status</th>
                </tr>
            </thead>
            <tbody>

                @if($appointments->isEmpty())
            <p>No appointments found for the provided CNIC and Phone Number.</p>
        @else
        @foreach($appointments as $appointment)
                <tr>
                    <th scope="row">{{$appointment->Apt_id}}</th>
                    <td>{{$appointment->doctor->Name}}</td>
                    <td>{{$appointment->Date}}</td>
                    <td>{{$appointment->Time_start}}</td>
                    <td>{{$appointment->Time_end}}</td>
                    <td>Approve</td>
                </tr>
                @endforeach
            </tbody>
            @endif
        </table>
    </div>
@endsection
