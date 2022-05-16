<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guarantor extends Model
{
    use HasFactory;
    protected $fillable = [
        'driver_id',
        'title',
        'last_name',
        'first_name',
        'dob',
        'gender',
        'religion',
        'phone_number',
        'email',
        'nin',
        'state',
        'city',
        'residential_address',
        'nigerian',
        'ex_convict',
        'company_name',
        'official_phone_number',
        'website',
        'company_address',
        'job_title',
        'job_grade',
        'relationship_to_applicant',
        'contact_company',
        'user_photo',
        'guarantor_type',
        'userType'
    ];
}
