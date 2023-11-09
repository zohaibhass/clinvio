@extends('/layouts/layout_landingpage')
@section('title',"home")
@section('content')
    <div class="container mb-5 d-flex" style="min-height:540px;">
        <div class="row flex-1">
            <div class="col-lg-6 col-md-12 align-item-center d-flex flex-1  justify-content-center"
                style="flex-direction: column">
                <!-- Left Side: Text -->
                <h1 class="text-center">You are <span style="color: #FC6600">one click away</span> from <span
                        style="color: #FC6600">getting</span> appointment <span style="color: #FC6600">with your doctor</span>
                </h1>
                <div class='mt-3 text-center'>
                    <a class="btn" style="background-color: #FC6600; color:white"  href="{{route('all_doctors_page')}}">find doctor</a>
                </div>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-4 col-md-12 d-flex align-items-center">
                <!-- Right Side: Image -->
                <img src="{{ asset('images/Frame1.png') }}" alt="Image" class="img-fluid w-100">
            </div>
        </div>
    </div>


    {{-- cards --}}


    {{-- card 1 --}}
    <div class="container mb-5 d">
        <div class="row ">
            @foreach ($doctors as $doctor)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top doc_img" src="{{ asset('/storage/public/uploads' . $doctor->Profile_picture) }}" style="object-fit: cover; object-position: top" alt="Card image cap">
                        <h5 class="card-title text-center card-header">{{ $doctor->Name }}</h5>
                        <div class="card-body">
                           
                            <h6 class="card-subtitle">Specialized in: <span
                                    style="color: #FC6600">{{$doctor->department->Name }}</span></h6>
                                
                            <p class="card-text">Description: <span style="color: #FC6600">{{$doctor->Description}}</span>
                            </p>
                        </div>
                        <div class="card-footer p-0 py-2 text-center">
                            <a class="btn orange-outline-button"  href="{{ Route('landing_doctor_details', ['id'=>$doctor->Doctor_id]) }}">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach

          

        </div>
        @if(count($doctors) >= 3)
        <div class="text-center">
            <a class="btn text-center mt-5 orange-outline-button"  href="{{route('all_doctors_page')}}">
                more
            </a>
        </div>
        @endif
    </div>

@endsection

