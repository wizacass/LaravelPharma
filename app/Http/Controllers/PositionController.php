<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    private $_validators = ['required', 'min:3', 'max:255'];

    public function index()
    {
        $positions = Position::all();
        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        return view('positions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => $this->_validators,
        ]);

        $position = new Position($attributes);
        $position->save();

        return redirect(route('positions.index'));
    }

    public function show(Position $position) 
    { 
        $employees = Employee::where('position_id', $position->id)->get();
        $label = "All {$position->title}s";
        return view('employees.index', compact('employees', 'label'));
    }

    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'));
    }

    public function update(Position $position)
    {
        $attributes = request()->validate([
            'title' => $this->_validators,
        ]);
        $position->update($attributes);

        return redirect(route('positions.index')); 
    }

    public function destroy($id)
    {
        Position::destroy($id);
        return redirect(route('positions.index'));
    }
}
