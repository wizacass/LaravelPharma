<?php

namespace App\Http\Controllers;

use App\Models\Medicament;

class MedicamentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $medicaments = Medicament::all();
        $label = "All medicaments";
        return view('medicaments.index', compact('medicaments', 'label'));
    }

    public function create()
    {
        return view('medicaments.create');
    }

    public function store()
    {
        $attributes = $this->validateMedicament();
        $medicament = new Medicament($attributes);
        $medicament->save();

        return redirect(route('medicaments.index'));
    }

    public function show($id)
    {
        return redirect(route('medicaments.index'));
    }

    public function edit(Medicament $medicament)
    {
        return view('medicaments.edit', compact('medicament'));
    }

    public function update(Medicament $medicament)
    {
        $attributes = $this->validateMedicament($medicament);
        $medicament->update($attributes);

        return redirect(route('medicaments.index')); 
    }

    public function destroy($id)
    {
        Medicament::destroy($id);
        return redirect(route('medicaments.index'));
    }

    private function validateMedicament($medicament = null)
    {
        $uniqueRule = 'unique:medicaments,bar_code';
        if($medicament != null)
        {
            $uniqueRule = $uniqueRule . ',' . $medicament->id;
        }

        $stringValidators = ['required', 'min:3', 'max:255'];
        return request()->validate([
            'name' => $stringValidators,
            'active_substance' => $stringValidators,
            'bar_code' => ['required', $uniqueRule, 'min:8', 'max:14', 'regex:/^[0-9]*$/'],
            'price' => ['required', 'numeric', 'min:0.01', 'regex:/^\d+\.\d{0,2}$/'],
            'recipe_required' => ['required', 'Boolean'],
        ]);
    }
}
