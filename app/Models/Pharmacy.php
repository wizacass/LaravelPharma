<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'revenue',
        'phone_number',
        'is_manufacturing',
        'max_employees',
    ];

    function registers()
    {
        return $this->hasMany('App\Models\Register');
    }

    function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }

    function medicaments()
    {
        return $this->hasMany('App\Models\Goods');
    }

    function isFull()
    {
        return $this->employees->count() == $this->max_employees;
    }

    function isEmpty()
    {
        return $this->employees->count() == 0;
    }

    function cash()
    {
        $cash = 0;
        foreach ($this->registers as $register)
        {
            $cash += $register->cash;
        }
        return $cash;
    }
}
