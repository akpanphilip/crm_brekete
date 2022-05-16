<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'license_plate',
        'type',
        'model',
        'side_number',
        'year',
        'chassis',
        'body',
        'engine',
        'transmission',
        'color'
    ];
}
