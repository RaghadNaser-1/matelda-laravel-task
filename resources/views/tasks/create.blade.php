@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Add New Task for {{ $employee->name }}</h1>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Task</button>
        </form>
    </div>
</div>
@endsection
