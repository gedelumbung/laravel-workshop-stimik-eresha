@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student Grade</div>

                <div class="card-body">
                    @if($errors->any())
                        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                    @endif
                    <form method="POST" action="{{ route('students.save_grade', ['id' => $data['student_id'] ]) }}">
                        @csrf
                        <div class="form-group">
                            <label>Course</label>
                            <select name="course_id" class="form-control">
                                <option value="">-- Select --</option>
                                @foreach($courses as $course)
                                    @if($course->id == $data['course_id'])
                                        <option value="{{ $course->id }}" selected="selected">{{ $course->name }}</option>
                                    @else
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Grade</label>
                            <input type="text" name="grade" class="form-control" value="{{ $data['grade'] }}">
                        </div>
                        <input type="hidden" name="action" value="{{ $action }}">
                        <input type="hidden" name="id" value="{{ $data['id'] }}">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
