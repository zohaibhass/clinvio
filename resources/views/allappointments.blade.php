@extends('layouts.layout_landingpage')
@section('title',"all doctors")
@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row hidden-md-up">

                {{-- card one --}}
                @foreach($doctors as $doctor)
        <div class="col-md-3 mt-3">
            <div class="card">
                <img class="card-img-top doc_img" src="{{ asset('/storage/public/uploads' . $doctor->Profile_picture) }}" alt="Card image cap">
                <h5 class="card-title text-center card-header">{{ $doctor->Name }}</h5>

                <div class="card-body">
                    <h6 class="card-subtitle">Specialized in: <span style="color: #FC6600">{{ optional ($doctor->department)->Name }}</span></h6>
                    <p class="card-text">Description: <span style="color: #FC6600">{{ $doctor->Description }}</span></p>
                </div>

                <div class="card-footer p-0 py-2 text-center">
                    <a href="{{ Route('landing_doctor_details', ['id'=> $doctor->Doctor_id]) }}" class="btn btn-primary" style="background-color: #FC6600">select</a>
                </div>
            </div>
        </div>
    @endforeach


                {{-- card 2 --}}

                {{-- <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top doc_img" src="{{ asset('images/1650380381-doctor.jpeg') }}"
                            alt="Card image cap">
                        <h5 class="card-title text-center card-header">Dr Amin</h5>

                            <div class="card-body">

                                <h6 class="card-subtitle">Specilized in: <span style="color: #FC6600">cardiology</span>
                                </h6>

                                <p class="card-text"> Description : <span style="color: #FC6600"> Cardiology is the
                                        medical
                                        specialty that deals with disorders of the heart, as well as some parts of the
                                        circulatory
                                        system.</span></p>
                            </div>
                            <div class="card-footer p-0 py-2 text-center">
                                <a href="#" class="btn btn-primary" style="background-color: #FC6600">select</a>
                            </div>
                    </div>
                </div> --}}

                {{-- card 3 --}}

                {{-- <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top doc_img" src="{{ asset('images/images.jpg') }}" alt="Card image cap">
                        <h5 class="card-title text-center card-header">Dr Amin</h5>

                        <div class="card-body">

                            <h6 class="card-subtitle">Specilized in: <span style="color: #FC6600">cardiology</span>
                            </h6>

                            <p class="card-text"> Description : <span style="color: #FC6600"> Cardiology is the
                                    medical
                                    specialty that deals with disorders of the heart, as well as some parts of the
                                    circulatory
                                    system.</span></p>
                        </div>
                        <div class="card-footer p-0 py-2 text-center">
                            <a href="#" class="btn btn-primary" style="background-color: #FC6600">select</a>
                        </div>
                    </div>
                </div> --}}
                {{-- card 4 --}}
                {{-- <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top doc_img" src="{{ asset('images/images.jpeg') }}" alt="Card image cap">
                        <h5 class="card-title text-center card-header">Dr Amin</h5>

                        <div class="card-body">

                            <h6 class="card-subtitle">Specilized in: <span style="color: #FC6600">Oncology</span>
                            </h6>

                            <p class="card-text"> Description : <span style="color: #FC6600"> Cardiology is the
                                An Oncology doctor specializes in the diagnosis, treatment, and compassionate care of patients with cancer.</span></p>
                        </div>
                        <div class="card-footer p-0 py-2 text-center">
                            <a href="#" class="btn btn-primary" style="background-color: #FC6600">select</a>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-3 mt-3">
                    <div class="card">
                        <img class="card-img-top doc_img"
                            src="{{ asset('images/attractive-young-male-nutriologist-lab-coat-smiling-against-white-background_662251-2960.avif') }}"
                            alt="Card image cap">
                        <h5 class="card-title text-center card-header">Dr Amin</h5>

                        <div class="card-body">

                            <h6 class="card-subtitle">Specilized in: <span style="color: #FC6600">cardiology</span>
                            </h6>

                            <p class="card-text"> Description : <span style="color: #FC6600"> Cardiology is the
                                    medical
                                    specialty that deals with disorders of the heart, as well as some parts of the
                                    circulatory
                                    system.</span></p>
                        </div>
                        <div class="card-footer p-0 py-2 text-center">
                            <a href="#" class="btn btn-primary" style="background-color: #FC6600">select</a>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-3 mt-3">
                    <div class="card">
                        <img class="card-img-top doc_img" src="{{ asset('images/istockphoto-1327024466-612x612.jpg') }}"
                            alt="Card image cap">
                        <h5 class="card-title text-center card-header">Dr Asif</h5>

                        <div class="card-body">

                            <h6 class="card-subtitle">Specilized in: <span style="color: #FC6600">cardiology</span>
                            </h6>

                            <p class="card-text"> Description : <span style="color: #FC6600"> Cardiology is the
                                    medical
                                    specialty that deals with disorders of the heart, as well as some parts of the
                                    circulatory
                                    system.</span></p>
                        </div>
                        <div class="card-footer p-0 py-2 text-center">
                            <a href="#" class="btn btn-primary" style="background-color: #FC6600">select</a>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="col-md-3 mt-3">
                    <div class="card">
                        <img class="card-img-top doc_img"
                            src="{{ asset('images/pretty-confident-young-indian-doctor-posing-with-tablet-computer-against-white-background_274689-23405.avif') }}"
                            alt="Card image cap">
                        <h5 class="card-title text-center card-header">Dr Aliya</h5>

                        <div class="card-body">

                            <h6 class="card-subtitle">Specilized in: <span style="color: #FC6600">Ophthalmology:
                            </span>
                            </h6>

                            <p class="card-text"> Description : <span style="color: #FC6600"> Cardiology is the
                                Ophthalmologists are eye specialists who diagnose and treat eye diseases and perform eye surgeries. They prescribe glasses and contact lenses as well.</span></p>
                        </div>
                        <div class="card-footer p-0 py-2 text-center">
                            <a href="#" class="btn btn-primary" style="background-color: #FC6600">select</a>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="col-md-3 mt-3">
                    <div class="card">
                        <img class="card-img-top doc_img" src="{{ asset('images/woman-2141808_1280.jpg') }}"
                            alt="Card image cap">
                        <h5 class="card-title text-center card-header">Dr Abbas</h5>

                        <div class="card-body">

                            <h6 class="card-subtitle">Specilized in: <span style="color: #FC6600">Neurology:</span>
                            </h6>

                            <p class="card-text"> Description : <span style="color: #FC6600"> Cardiology is the
                                    mNeurologists focus on disorders of the nervous system, including the brain and spinal cord. They diagnose and treat conditions like epilepsy, strokes, and multiple sclerosis.</span></p>
                        </div>
                        <div class="card-footer p-0 py-2 text-center">
                            <a href="#" class="btn btn-primary" style="background-color: #FC6600">select</a>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
@endsection
