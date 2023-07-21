@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Edit Task</h1>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $task->date }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ $task->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>
</div>
@endsection
