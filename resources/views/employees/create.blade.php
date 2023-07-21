@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Add New Employee</h1>
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Employee</button>
        </form>
    </div>
</div>
@endsection
