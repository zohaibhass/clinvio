@extends('doctor_dashboard.doctors_layout')
@section('title','all patients')
@section('content')

<main>
    
    <div class="container mt-5">
        <div>
       <h3 class="text-center">Requested Appointments</h3>  
     </div>
     <table class="table table-striped">
      
        @if (session('success'))
        <div class="alert alert-success">
        {{session('success')}}
      </div>
        @endif
      
         <thead>
           <tr>
             <th scope="col">Pat_id</th>
             <th scope="col">Doctor name</th>
             <th scope="col">Phone NO</th>
             <th scope="col">Gender</th>
             <th scope="col">Age</th>
             <th scope="col text-center">Action</th>
            
            </tr>
         </thead>
         <tbody>
          @if (session('success'))
            
          @endif


           @foreach ($pendingAppointments as $pat )
             
          
           @php
           $i=1;
         @endphp
           <tr>
             <th scope="row">{{$i}}</th>
             <td>{{$pat->patient->Name ??'N/A'}}</td>
             <td>{{$pat->patient->Phone ?? 'N/A' }}</td>
             <td>{{$pat->patient->Gender ?? 'N/A'}}</td>
             <td>{{$pat->patient->Age ?? 'N/A'}}</td>
           
             <td><a class="btn btn-primary btn-sm" href="{{ Route('single_patient', $pat->Apt_id) }}">View</a>
              <a class="btn btn-success btn-sm" href="{{route('appointments.accept',['id'=>$pat->Apt_id,'status'=>'confirm'])}}" >Confirm</a>
              <a class="btn btn-danger btn-sm" href="{{ Route('reject_patients', $pat->Pat_id) }}">Cancel</a>

          </td>
          @php
          $i++;
        @endphp
           </tr>
           @php
           $i++;
         @endphp


           @endforeach
         </tbody>
       </table>
    </div>

</main>
    
@endsection