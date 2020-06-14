@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Birth Place</th>
                                <th>Birth Date</th>
                                <th>Address</th>
                                <th><a href="{{ route('students.add') }}" class="btn btn-sm btn-dark">Add New</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($students->count() === 0)
                                <tr>
                                    <td colspan="6" class="text-center">No record</td>
                                </tr>
                            @endif
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->birth_place }}</td>
                                    <td>{{ $student->birth_date }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>
                                        <a href="{{ route('students.edit', ['id' => $student->id]) }}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ route('students.delete', ['id' => $student->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                                        <a href="{{ route('students.grades', ['id' => $student->id]) }}" class="btn btn-sm btn-primary">Grade</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
