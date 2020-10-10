<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

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

    public function show($id) 
    { 
        return redirect(route('positions.index')); 
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
