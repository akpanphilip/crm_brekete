<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
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
        'primary_school',
        'primary_school_address',
        'graduated_primary',
        'qualification_type_primary',
        'secondary_school',
        'secondary_school_address',
        'graduated_secondary',
        'qualification_type_secondary',
        'tertiary_school',
        'tertiary_school_address',
        'graduated_tertiary_school',
        'qualification_type_tertiary',
        'relationship',
        'relative_last_name',
        'relative_first_name',
        'relative_date_of_birth',
        'relative_gender',
        'relative_phone',
        'relative_email',
        'relative_nin',
        'relative_state',
        'relative_city',
        'relative_residential_address',
        'relative_citizenship',
        'relative_ex_convict',
        'driver_company',
        'driver_company_official_phone_number',
        'driver_company_website',
        'driver_company_supervisor',
        'driver_company_supervisor_phone',
        'driver_job_title',
        'driver_work_lenght',
        'driver_reason_for_leaving',
        'contact_company_for_reference',
        'driver_bank_name',
        'driver_account_number',
        'driver_account_name',
        'driver_bvn',
        'driver_photo',
        'driver_id',
        'userType'
    ];
}
