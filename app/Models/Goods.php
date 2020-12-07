<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    use HasFactory;

    protected $fillable = [
        "quantity",
        "price",
        "pharmacy_id",
        "medicament_id",
    ];

    function product()
    {
        return $this->belongsTo('App\Models\Medicament', 'medicament_id');
    }
}
