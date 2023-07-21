@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Employee Details</h1>
        <p><strong>ID:</strong> {{ $employee->id }}</p>
        <p><strong>Name:</strong> {{ $employee->name }}</p>
        <p><strong>Phone:</strong> {{ $employee->phone }}</p>
        <p><strong>Address:</strong> {{ $employee->address }}</p>

        <h2>Tasks</h2>
        <a href="{{ route('tasks.create', $employee->id) }}" class="btn btn-primary mb-3">Add New Task</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employee->tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->date }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
