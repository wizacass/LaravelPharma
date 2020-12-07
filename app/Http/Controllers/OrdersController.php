<?php

namespace App\Http\Controllers;

use App\Models\Medicament;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Show($id)
    {
        $medicaments = Medicament::all();
        return view('pharmacies.order', compact('id', 'medicaments'));
    }

    public function Order()
    {
        dd(request());
    }
}
