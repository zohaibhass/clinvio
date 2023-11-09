@extends('admin.index')
@section('title', 'add doctors')
@section('content')
    <div class=" container col-md-8 order-md-1">

        <h4 class="mb-3 text-center mt-5">Add Doctor</h4>
        <div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('success'))

            <div class="alert alert-danger">
                {{ session('error') }}
            </div>

            @endif

            <form action="{{ Route('insert_doctor') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    {{-- <div class="team_form"> --}}
                    <div class="col-md-6 mb-3">
                        <label for="team_name">Doctor Name</label>
                        <input type="text" class="form-control" name="doc_name"  value="{{old('doc_name')}}" placeholder="Doctor Name"
                            value="" required="">

                    </div>


                    <div class="col-md-6 mb-3">
                        <label for="EMAIL">Email</label>
                        <input type="text" class="form-control" name="email" value="{{old('email')}}"
                            placeholder="Enter your Email" value="" required="">

                    </div>
                    {{-- </div> --}}

                    <div class="row">

                        <div class="form-group col-md-6 mb-3">
                            <label for="specialty">Specialty:</label>
                            <select class="form-control" id="specialty" name="specialty">
                                <option value="" selected>Select specility</option>
                                @foreach (\App\Models\Department::select('Name')->get() as $Department)
                                    <option value="{{ $Department->Dept_id }}">{{ $Department->Name }}</option>
                                @endforeach
                                <!-- Add more specialty options as needed -->
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="pofile_picture">Profile Picture</label>
                            <input type="file" class="form-control" name="profile_picture" id="profile_picture" value="{{old('pofile_picture')}}"
                                required="">

                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="phoneph">Phone No</label>
                            <input type="text" class="form-control" name="phone_no" id="phone"
                                placeholder="Enter Phone No" value="{{old('phone_no')}}" required="">

                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="gender">Gender:</label>
                            <input type="gender" class="form-control" name="gender" id="Gender"
                                placeholder="male/female" value="{{old('gender')}}" required="">
                        </div>
                    </div>

                <div class="row">


                 <div class="col-md-6 mb-3">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" name="age" id="age" value="{{old('age')}}"
                            required="">

                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="inputCity">city</label>
                        <input type="text" class="form-control" name="city" id="city" value="{{old('city')}}"
                            required="">

                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="inputstate">State</label>
                            <input type="text" class="form-control" name="state" id="state"
                                placeholder="state or provience" value="{{old('state')}}" required="">

                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" name="country" id="country"
                                placeholder="enter your country" value="{{old('country')}}" required="">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="inputAdress">Adress</label>
                            <input type="text" class="form-control" name="adress" id="adress"
                                placeholder="enter your adress" value="{{old('adress')}}" required="">

                        </div>

                    </div>


                </div>

                    <div class="mb-3">
                        <label for="team_description">Description</label>
                        <textarea rows="7" class="form-control" name="doc_description" value="" placeholder="text" required="">{{old('doc_description')}}</textarea>
                    </div>


                </div>
                <div class="text-center">
                    <i class="fa-solid fa-plus"></i> <input class="orange-outline-button" type="submit" value="Add">
            </div>
            </form>
        @endsection
