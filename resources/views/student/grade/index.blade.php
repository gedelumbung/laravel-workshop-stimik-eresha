@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student Grade</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Name</td>
                            <td>{{ $student->name }}</td>
                        </tr>
                        <tr>
                            <td>Birth Place</td>
                            <td>{{ $student->birth_place }}</td>
                        </tr>
                        <tr>
                            <td>Birth Date</td>
                            <td>{{ $student->birth_date }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $student->address }}</td>
                        </tr>
                    </table>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Course</th>
                                <th>Grade</th>
                                <th><a href="{{ route('students.add_grade', ['id' => $student->id]) }}" class="btn btn-sm btn-dark">Add New</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($student->grades->count() === 0)
                                <tr>
                                    <td colspan="3" class="text-center">No record</td>
                                </tr>
                            @endif
                            @foreach($student->grades as $grade)
                                <tr>
                                    <td>{{ $grade->course->name }}</td>
                                    <td>{{ $grade->grade }}</td>
                                    <td>
                                        <a href="{{ route('students.edit_grade', ['id' => $student->id, 'grade_id' => $grade->id]) }}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ route('students.delete_grade', ['id' => $student->id, 'grade_id' => $grade->id]) }}" class="btn btn-sm btn-danger">Delete</a>
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
