@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Edit Employee</h1>
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $employee->name }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $employee->phone }}" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $employee->address }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Employee</button>
        </form>
    </div>
</div>
@endsection
