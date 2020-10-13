<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('I edit a medicamnet!');
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
        Medicament::destroy($id);
        return redirect(route('medicaments.index'));
    }

    private function validateMedicament()
    {
        $stringValidators = ['required', 'min:3', 'max:255'];
        return request()->validate([
            'name' => $stringValidators,
            'active_substance' => $stringValidators,
            'bar_code' => ['required', 'unique:medicaments,bar_code', 'min:8', 'max:14', 'regex:/^[0-9]*$/'],
            'price' => ['required', 'numeric', 'min:0.01'],
            'recipe_required' => ['required', 'Boolean'],
        ]);
    }
}
