@extends('layouts.layout_landingpage')
@section('title', 'appointment boking')
@section('content')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"
        integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



    <div class="container p-5">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="doc__card mb-5">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('/storage/public/uploads' . $doctor_detail->Profile_picture) }}"
                            style="border-radius:50%; object-fit: cover; object-position: top" class="img-fluid">
                    </div>
                    <hr>
                    <div class="doctor-name mt-3"> <b>Doctor Name</b>: {{ $doctor_detail->Name }}</div>
                    <div class="specialties">
                        <b>Specialist</b>:{{ optional($show_dept)->Name }}</span>

                    </div>
                    <div class="contact-info">
                        <p><b>Email</b> : {{ $doctor_detail->Email }}</p>
                        <p><b>Phone No</b>: {{ $doctor_detail->Phone }}</p>
                        <p><b>country</b>:{{ $doctor_detail->country }}</p>
                        <p><b>state</b>:{{ $doctor_detail->state }}</p>
                        <p><b>Adress</b>:{{ $doctor_detail->adress }}</p>
                        <p><b>About</b>:{{ $doctor_detail->Description }}</p>

                    </div>
                    <div class="card-footer ">
                        <h2>Current Availability</h2>
                        <table class="table table-bordered avatable">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($availabilityData as $availability)
                                    <tr>
                                        <td>{{ $availability->day }}</td>
                                        <td>{{ $availability->start_time }}</td>
                                        <td>{{ $availability->end_time }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-sm-12 col-md-6">
                <h2>Book an Appointment</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @elseif (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ Route('book_appointment') }}" method="POST" id="appointmentForm">
                    @csrf
                    <div class="form-group">
                        <label for="name">Your Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    {{-- <div class="form-group d-none">
                        <label for="apt_id">Apt_id:</label>
                        <input type="text" id="apt_id" name="apt_id">
                    </div> --}}
                    {{-- <div class="form-group d-none">
                        <label for="pat_id">patient_id:</label>
                        <input type="hidden" id="pat_id" name="pat_id">
                    </div> --}}

                    <div class="form-group d-none">
                        <label for="">Doctor_id:</label>

                        <input type="hidden" name="doctor_id" value="{{ $doctor_detail->Doctor_id }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone No:</label>
                        <input type="text" id="phone" name="phone" required>
                    </div>

                    <div class="form-group">
                        <label for="cnic">Cnic:</label>
                        <input type="text" id="cnic" name="cnic" required>
                    </div>

                    <div class="form-group">
                        <label for="Gender">Gender:</label>
                        <input type="text" id="Gender" name="Gender" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Age:</label>
                        <input type="number" class="form-control" id="Age" name="Age" required>
                    </div>

                    <div class="form-group">
                        <label for="date">Select Date:</label>
                        <input type="text" id="date" name="date">

                        <div id="my_calendar"></div>

                    </div>
                    <div class="mb-3">
                        <label for="pat_description">Description</label>
                        <textarea rows="7" class="form-control" name="pat_description" value="" placeholder="explain your illness"
                            required=""></textarea>
                    </div>
                    <input class="orange-outline-button" type="submit" value="Book Appointment">
                </form>
            </div>
        </div>




    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"
        integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        jQuery('#date').datetimepicker({
            onSelectTime: function(curr_time, $input) {
                console.log($('#date').datetimepicker('getValue'))
            }
        });

        //     webix.ui({
        //     view:"calendar",
        //     id:"my_calendar",
        //     date:new Date(2012,3,16),
        //     weekHeader:true,
        //     events:webix.Date.isHoliday,
        //     // width:300,
        //     // height:250
        // });
    </script>
@endsection
