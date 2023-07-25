@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Employee List</h1>
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add New Employee</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr id="employeeRow{{ $employee->id }}">
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->address }}</td>
                        <td>
                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                            </form>
                            <button class="btn btn-danger btn-sm delete-btn" data-employee-id="{{ $employee->id }}">Delete using JS</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    // Attach event listeners to all "Delete using JS" buttons
    const deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const employeeId = this.getAttribute('data-employee-id');

            if (confirm('Are you sure you want to delete this record?')) {
                // Make an AJAX request to delete the employee
                fetch(`/employees/${employeeId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => {
                    if (response.ok) {
                        // If the deletion was successful, remove the row from the table
                        const employeeRow = document.getElementById(`employeeRow${employeeId}`);
                        employeeRow.remove();
                    } else {
                        // alert('Failed to delete the employee.');
                        alert('Please reload your page');

                    }
                })
                .catch(error => {
                    alert('An error occurred while deleting the employee.');
                    console.error(error);
                });
            }
        });
    });
</script>

@endsection
