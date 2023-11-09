@extends('doctor_dashboard.doctors_layout')
@section('title', 'profile setting')
@section('content')


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 card"
                style="box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
                <!-- Profile Picture -->
                <img class="card-body" src="{{ asset('/storage/public/uploads' . $doctor->Profile_picture) }}"
                    alt="Doctor Profile Picture" class="img-fluid rounded mb-3 profile-picture">
                <div class="upload-btn-wrapper">
                    <button class="btn-upload orange-outline-button ">Change Profile Photo</button>
                    <input type="file" name="profile_photo" id="profile_photo" accept="image/*">
                </div>
            </div>
            <div class="col-md-8"
                style="box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('success'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <!-- Profile Settings Form -->
                <h2 class="mb-4">Doctor Profile Settings</h2>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" value="{{ $doctor->Name }}"
                            placeholder="Enter your full name">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email"
                            value="{{ $doctor->Email }}">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" value="{{ $doctor->Phone }}"
                            placeholder="Enter your password">
                    </div>


                    <div class="mb-3">
                        <label for="dept_id" class="form-label">Specialty</label>
                        <select class="form-select" id="dept_id" name="dept_id">
                            @foreach ($departments as $department)
                                <option value="{{ $department->Dept_id }}"
                                    {{ $doctor->dept_id == $department->Dept_id ? 'selected' : '' }}>
                                    {{ $department->Name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class=" orange-outline-button mb-2 ">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
    </div>


@endsection
