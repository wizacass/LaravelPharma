<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $fillable = [
        'pharmacy_id',
        'model_id',
    ];

    public function model()
    {
        return $this->belongsTo('App\Models\RegisterModel');
    }
}
