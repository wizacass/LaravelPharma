<?php

namespace App\Http\Controllers;

use App\Models\Register;

class RegistersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createRegister($id)
    {
        $modelId = request()->validate([
            'model' => ['required', 'integer', 'exists:register_models,id']
        ]);

        $register = new Register;
        $register->pharmacy_id = $id;
        $register->model_id = $modelId["model"];
        $register->save();

        return redirect("/pharmacies/$id");
    }

    public function destroyRegister($id)
    {
        $registerId = request()->validate([
            'register' => ['required', 'integer', 'exists:registers,id']
        ]);
        Register::destroy($registerId);
        return redirect("/pharmacies/$id");
    }
}
