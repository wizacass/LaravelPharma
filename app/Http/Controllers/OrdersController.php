<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\Medicament;
use App\Models\Pharmacy;

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
        $attributes = request()->validate([
            'id' => ['required', 'exists:pharmacies,id'],
            'goods.*' => ['integer', 'distinct'],
            'amounts.*' => ['integer', 'min:1'],
        ]);

        $id = $attributes["id"];
        $pharmacy = Pharmacy::find($id);
        $products = $pharmacy->medicaments;
        for ($i = 0; $i < count($attributes["goods"]); $i++) {
            $product_id = $attributes["goods"][$i];
            $amount = $attributes["amounts"][$i];
            if (!$this->addExisting($products, $product_id, $amount)) {
                $product = Medicament::find($product_id);
                $new_product = new Goods();
                $new_product->quantity = $amount;
                $new_product->price = $product->price;
                $new_product->pharmacy_id = $id;
                $new_product->medicament_id = $product_id;
                $new_product->save();
            }
        }

        return redirect("/pharmacies/$id");
    }

    private function addExisting($products, $id, $amount)
    {
        foreach ($products as $product) {
            if ($product->id == $id) {
                $product->quantity += $amount;
                $product->save();
                return true;
            }
        }
        return false;
    }
}
