@extends('admin.index')
@section('title', 'dashboard')
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4 text-center">
                        <div class="card-body"><h5 class="badge text-bg-success">New doctors : {{$new_doc_count}}</h5></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            {{-- <a class="small text-white stretched-link" href="#">View Details</a> --}}
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body text-center"><h4 class="badge text-bg-danger">todays Appointments {{$todaysappointments}}</h4></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            {{-- <a class="small text-white stretched-link" href="#">View Details</a> --}}
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body text-center"> <h5 class="badge text-bg-warning">total Appointments {{$totalappointments}}</h5></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            {{-- <a class="small text-white stretched-link" href="#">View Details</a> --}}
                       
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body text-center"> <h5 class="badge text-bg-primary">Total doctors : {{$all_doc_count}}</h5> </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            {{-- <a class="small text-white stretched-link" href="#">View Details</a> --}}
                          
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container mt-2 mx-3  ">
                <div>
               <h3 class="text-center">Recent Doctors</h3>  
             </div>
             <table class="table table-bordered table-striped">
                 <thead>
                   <tr>
                     <th scope="col">S#no</th>
                     <th scope="col">Doctor name</th>
                     <th scope="col">Phone NO</th>
                     <th scope="col">Gender</th>
                     <th scope="col">Age</th>
                     {{-- <th scope="col">Specility</th> --}}
                     <th scope="col" >Description</th>
     
                   </tr>
                 </thead>
                 <tbody>

                    @php
                        $i=1;
                    @endphp

                    @foreach ($recentDoctors as $doc )
                        
                   

                   <tr>
                     <th scope="row">{{$doc->Doctor_id}}</th>
                     <td>{{$doc->Name}}</td>
                     <td>{{$doc->Phone}}</td>
                     <td>{{$doc->Gender}}</td>
                     <td>{{$doc->Age}}</td>
                     {{-- <td>{{$doc->Doctor_id}}</td> --}}
                     <td  class="table-cell">{{$doc->Description}}</td>
     
                   </tr>
                   @php
                   $i++;
               @endphp
                   @endforeach
                 </tbody>
               </table>
             </div>
     
        </div>
    </main>
@endsection