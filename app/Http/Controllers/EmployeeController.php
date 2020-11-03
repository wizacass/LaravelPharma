<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Position;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(5);
        $label = "All employees";
        return view('employees.index', compact('employees', 'label'));
    }

    public function create()
    {
        $positions = Position::all();
        return view('employees.create', compact('positions'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'surname' => ['required', 'max:255'],
            'position_id' => ['required', 'exists:positions,id'],
        ]);

        $employee = new Employee($attributes);
        $employee->save();

        return redirect(route('employees.index')); 
    }

    public function show($id)
    {
        return redirect(route('employees.index')); 
    }

    public function edit(Employee $employee)
    {
        $positions = Position::all();
        return view('employees.edit', compact('employee', 'positions'));
    }

    public function update(Employee $employee)
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'surname' => ['required', 'max:255'],
            'position_id' => ['required', 'exists:positions,id'],
        ]);
        $employee->update($attributes);

        return redirect(route('employees.index')); 
    }

    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect(route('employees.index'));
    }
}
