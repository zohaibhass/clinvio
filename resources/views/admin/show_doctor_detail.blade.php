@extends('admin.index')
@section('title', 'doctors details')

@section('content')

    <div class="container ms-4 mt-5">
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center">
                <div style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                    <img src="{{ asset('/storage/public/uploads' . $doctor->Profile_picture) }}" alt="Doctor Profile"
                        class="doctor-profile-img img-fluid" style="object-fit: cover; object-position: top">
                </div>
            </div>
            <div class="col-md-8" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <h2>Doctor Details</h2>
                <table class="table">

                    <thead>
                        <th scope="row">Doctor Name</th>
                        <th scope="row">Phone No</th>
                        <th scope="row">Gender</th>
                        <th scope="row">Age</th>
                        <th scope="row">Specialty</th>
                        <th scope="row">Description</th>

                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $doctor->Name }}</td>
                            <td>{{ $doctor->Phone }}</td>
                            <td>{{ $doctor->Gender }}</td>
                            <td>{{ $doctor->Age }}</td>
                            <td>{{ optional($department)->Name }}</td>
                            <td>{{ $doctor->Description }}</td>
                        </tr>
                    </tbody>
                </table>
                <h2>Certification Details</h2>
                <table class="table">
                    <thead>
                        <th>Certification Title:</th>
                        <th>Organization Name:</th>
                        <th>Certification Description:</th>
                    </thead>


                    <tbody>
                        {{-- {{dd($certification)}} --}}
                        @if ($certification)
                            @foreach ($certification as $certi)
                                <tr>
                                    <td>{{ $certi->name }}</td>
                                    <td>{{ $certi->organization }}</td>
                                    <td>{{ $certi->completion_date }}</td>
                                    <td>{{ $certi->certi_description }}</td>
                                    <td>
                                        @php
                                            $image= App\Models\Image::where("img_id", $certi->file_id)->first();
                                        @endphp

                                        @if($image!=null)
                                        <a href="{{ Storage::url($image->Image_path) }}"
                                            download="Certification Document.pdf"
                                            class="orange-outline-button px-4 py-1 mb-2" style="white-space: nowrap">
                                            Download pdf&nbsp;<i class="fa-solid fa-download"></i>
                                        </a>

                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">No certification data available.</td>
                            </tr>
                        @endif
                            
                    </tbody>
                </table>


            </div>
        </div>
        <div class="mt-5 text-center">
            <form action="{{ route('approve.doctor', ['id' => $doctor->Doctor_id]) }}" method="POST"
                style="display:inline;">
                @csrf
                <input type="submit" class="btn btn-success" value="Accept">
            </form>

            <!-- Reject Button -->
            <form action="{{ route('reject.doctor', ['id' => $doctor->Doctor_id]) }}" method="POST"
                style="display:inline;">
                @csrf
                <input type="submit" class="btn btn-danger" value="Reject">
        </div>

    </div>

    </div>




@endsection
