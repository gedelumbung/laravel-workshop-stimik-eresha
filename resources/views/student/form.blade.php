@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student</div>

                <div class="card-body">
                    @if($errors->any())
                        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                    @endif
                    <form method="POST" action="{{ route('students.save') }}">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $data['name'] }}">
                        </div>
                        <div class="form-group">
                            <label>Birth Place</label>
                            <input type="text" name="birth_place" class="form-control" value="{{ $data['birth_place'] }}">
                        </div>
                        <div class="form-group">
                            <label>Birth Date</label>
                            <input type="date" name="birth_date" class="form-control" value="{{ $data['birth_date'] }}">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" name="address" class="form-control" cols="30" rows="5">{{ $data['address'] }}</textarea>
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
