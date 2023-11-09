@extends('admin.index')
@section('title', 'all doctors')
@section('content')
    <main>

        <div class="container mt-5">
            <div>
                <h3 class="text-center">All doctors</h3>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">S#no</th>
                        <th scope="col">Doctor name</th>
                        <th scope="col">Phone NO</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Status</th>
                        <th scope="col">Specility</th>
                        <th scope="col">Description</th>
                        <th scope="col">Details</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp

                    @foreach ($doc_data as $doc)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $doc->Name }}</td>
                            <td>{{ $doc->Phone }}</td>
                            <td>{{ $doc->Gender }}</td>
                            <td>{{ $doc->status }}</td>
                            <td>{{ $doc->Department->Name }}</td>
                            <td class="table-cell">{{ $doc->Description }}</td>
                            <td><a class="btn btn-outline-primary" href="{{ Route('doctor_detail', ['id'=>$doc->Doctor_id]) }}"><i class="fa-solid fa-eye"></i> </a> </td>
                            <td><a class="btn btn-outline-info" href="{{ Route('update_page', ['id'=>$doc->Doctor_id]) }}"><i
                                        class="fa-solid fa-pen-to-square"></i> </a> </td>
                            <td><a class="btn btn-outline-danger" href="{{ Route('delete_doctor', $doc->Doctor_id) }}"><i
                                        class="fa-solid fa-trash-can"></i></a></td>

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
