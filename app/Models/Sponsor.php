<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    protected $fillable = [
        'last_name',
        'first_name',
        'dob',
        'gender',
        'phone',
        'email',
        'nin',
        'state',
        'city',
        'residential_address',
        'address',
        'nigerian',
        'ex-convict',
        'bank_name',
        'account_number',
        'account_name',
        'bvn',
        'photo',
        'sponsor_id',
        'userType'
    ];
}
