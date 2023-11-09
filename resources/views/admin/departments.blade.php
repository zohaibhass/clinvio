@extends('admin.index')
@section('title', 'departments')
@section('content')
    <div class="container  borders mt-5">
        <div class="text-center">
            <h3>Main Departments</h3>
        </div>

        <table class="table table-light  borders mt-2">
            <thead>
                <tr>
                    <th scope="col">Dept_id</th>
                    <th scope="col">Department Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($show_depts as $data)
                    <tr>
                        <td>{{ $data->Dept_id }}</td>
                        <td>{{ $data->Name }}</td>
                        <td>{{ $data->Description }}</td>

                        <td><a class="btn btn-outline-info" href="{{ Route('updatedept_page', ['id' => $data->Dept_id]) }}"><i
                                    class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a class="btn btn-outline-danger" href="{{ Route('dlt_dept', ['id' => $data->Dept_id]) }}"><i
                                    class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
    {{ $show_depts->links() }}
@endsection
