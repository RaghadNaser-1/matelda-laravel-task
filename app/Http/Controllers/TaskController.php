<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Employee;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }
    // Show the form to create a new task for an employee
    public function create(Employee $employee)
    {
        return view('tasks.create', compact('employee'));
    }

    // Store a new task for an employee in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'description' => 'required',
            'employee_id' => 'required|exists:employees,id',
        ]);

        Task::create($request->all());

        return redirect()->route('employees.show', $request->employee_id)->with('success', 'Task added successfully');
    }

    // Show the form to edit an existing task
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Update an existing task in the database
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'description' => 'required',
        ]);

        $task->update($request->all());

        return redirect()->route('employees.show', $task->employee_id)->with('success', 'Task updated successfully');
    }

    // Delete a task from the database
    public function destroy(Task $task)
    {
        $employeeId = $task->employee_id;
        $task->delete();

        return redirect()->route('employees.show', $employeeId)->with('success', 'Task deleted successfully');
    }
}

