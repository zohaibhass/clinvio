@extends('layouts/layout_landingpage')
@section('title',"searched results")
@section('content')
    <div class="container">
        <h2>Search Results</h2>
        
        @if(count($doctors) > 0)
            <div class="row">
                @foreach($doctors as $doctor)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img class="card-img-top doc_img" src="{{ asset('/storage/public/uploads' . $doctor->Profile_picture) }}" style="object-fit: cover; object-position: top" alt="Doctor Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $doctor->Name }}</h5>
                               
                                <p class="card-text"> <b>Specialized in:</b>  {{ optional($doctor->department)->Name }}</p>
                                <p class="card-text"><b>Description:</b>{{ $doctor->Description }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ Route('landing_doctor_details', ['id'=>$doctor->Doctor_id]) }}"
                                    class="btn orange-outline-button">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No doctors found for the given search query.</p>
        @endif
    </div>
@endsection
