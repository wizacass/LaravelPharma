<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Position;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
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

    public function edit($id)
    {
        dd('I edit employee!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect(route('employees.index'));
    }
}
