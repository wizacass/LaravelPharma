<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'active_substance', 
        'bar_code', 
        'price', 
        'recipe_required',
    ];
}
