<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriverRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function basic_data(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'phone' => 'required|numeric|digits:11',
            'email' => 'required|email|unique:drivers',
            'nin' => 'required|numeric|digits:11',
            'state' => 'required',
            'city' => 'required',
            'residential_address' => 'required|max:80',
            'citizenship' => 'required',
            'ex_convict' => 'required',
        ]);
    }
    public function driver_education_data(Request $request)
    {
        $request->validate([
            'primary_school_name' => 'required',
            'primary_school_address' => 'required',
            'graduate_primary' => 'required',
            'primary_qualification_type' => 'required',
            'secondary_school_name' => 'required',
            'secondary_school_address' => 'required',
            'graduate_secondary' => 'required',
            'secondary_qualification_type' => 'required',
            'tertiary_school_name' => 'required',
            'tertiary_school_address' => 'required',
            'graduate_tertiary' => 'required',
            'tertiary_qualification_type' => 'required',
        ]);
    }
    public function driver_relative_data(Request $request)
    {
        $request->validate([
            'relationship' => 'required',
            'relative_last_name' => 'required',
            'relative_first_name' => 'required',
            'relative_date_of_birth' => 'required',
            'relative_gender' => 'required',
            'relative_phone' => 'required',
            'relative_email' => 'required',
            'relative_nin' => 'required',
            'relative_state' => 'required',
            'relative_city' => 'required',
            'relative_residential_address' => 'required|max:80',
            'relative_citizenship' => 'required',
            'relative_ex_convict' => 'required',
        ]);
    }
    public function company_data(Request $request)
    {
        $request->validate([
            'driver_company' => 'required',
            'driver_company_official_phone_number' => 'required',
            'driver_company_website' => 'required',
            'driver_company_supervisor' => 'required',
            'driver_company_supervisor_phone' => 'required',
            'driver_job_title' => 'required',
            'driver_work_lenght' => 'required',
            'driver_reason_for_leaving' => 'required',
            'contact_company_for_reference' => 'required',
        ]);
    }
    public function driver_bank_data(Request $request)
    {
        $request->validate([
            'driver_bank_name' => 'required',
            'driver_account_number' => 'required',
            'driver_account_name' => 'required',
            'driver_bvn' => 'required|numeric|digits:11',
        ]);
    }

    public function index()
    {
        $drivers = Driver::orderBy('id', 'desc')->get();
        return $drivers;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'last_name' => 'required',
            'first_name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'phone' => 'required|numeric|digits:11',
            'email' => 'required|email|unique:drivers',
            'nin' => 'required|numeric|digits:11',
            'state' => 'required',
            'city' => 'required',
            'residential_address' => 'required',
            'citizenship' => 'required',
            'ex_convict' => 'required',
            'primary_school_name' => 'required',
            'primary_school_address' => 'required',
            'graduate_primary' => 'required',
            'primary_qualification_type' => 'required',
            'secondary_school_name' => 'required',
            'secondary_school_address' => 'required',
            'graduate_secondary' => 'required',
            'secondary_qualification_type' => 'required',
            'tertiary_school_name' => 'required',
            'tertiary_school_address' => 'required',
            'graduate_tertiary' => 'required',
            'tertiary_qualification_type' => 'required',
            'relationship' => 'required',
            'relative_last_name' => 'required',
            'relative_first_name' => 'required',
            'relative_date_of_birth' => 'required',
            'relative_gender' => 'required',
            'relative_phone' => 'required',
            'relative_email' => 'required',
            'relative_nin' => 'required',
            'relative_state' => 'required',
            'relative_city' => 'required',
            'relative_residential_address' => 'required',
            'relative_citizenship' => 'required',
            'relative_ex_convict' => 'required',
            'driver_company' => 'required',
            'driver_company_official_phone_number' => 'required',
            'driver_company_website' => 'required',
            'driver_company_supervisor' => 'required',
            'driver_company_supervisor_phone' => 'required',
            'driver_job_title' => 'required',
            'driver_work_lenght' => 'required',
            'driver_reason_for_leaving' => 'required',
            'contact_company_for_reference' => 'required',
            'driver_bank_name' => 'required',
            'driver_account_number' => 'required',
            'driver_account_name' => 'required',
            'driver_bvn' => 'required',
            'userImage' => 'required',
        ]);

        $img = $request->userImage;
        $folderPath = public_path('uploads'); //path location
        $image_parts = explode(';base64,', $img);
        $image_type_aux = explode('image/', $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $uniqid = uniqid();
        $file = time() . $uniqid . '.' . $image_type;
        file_put_contents($file, $image_base64);

        $newDriver = Driver::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'nin' => $request->nin,
            'state' => $request->state,
            'city' => $request->city,
            'residential_address' => $request->residential_address,
            'nigerian' => $request->citizenship,
            'ex-convict' => $request->ex_convict,

            'primary_school' => $request->primary_school_name,
            'primary_school_address' => $request->primary_school_address,
            'graduated_primary' => $request->graduate_primary,
            'qualification_type_primary' => $request->primary_qualification_type,
            'secondary_school' => $request->secondary_school_name,
            'secondary_school_address' => $request->secondary_school_address,
            'graduated_secondary' => $request->graduate_secondary,
            'qualification_type_secondary'=> $request->secondary_qualification_type,
            'tertiary_school' => $request->tertiary_school_name,
            'tertiary_school_address' => $request->tertiary_school_address,
            'graduated_tertiary_school' => $request->graduate_tertiary,
            'qualification_type_tertiary'=> $request->tertiary_qualification_type,
            'relationship' => $request->relationship,
            'relative_last_name' => $request->relative_last_name,
            'relative_first_name' => $request->relative_first_name,
            'relative_date_of_birth' => $request->relative_date_of_birth,
            'relative_gender' => $request->relative_gender,
            'relative_phone' => $request->relative_phone,
            'relative_email' => $request->relative_email,
            'relative_nin' => $request->relative_nin,
            'relative_state' => $request->relative_state,
            'relative_city' => $request->relative_city,
            'relative_residential_address' => $request->relative_residential_address,
            'relative_citizenship' => $request->relative_citizenship,
            'relative_ex_convict' => $request->relative_ex_convict,
            'driver_company' => $request->driver_company,
            'driver_company_official_phone_number' => $request->driver_company_official_phone_number,
            'driver_company_website' => $request->driver_company_website,
            'driver_company_supervisor' => $request->driver_company_supervisor,
            'driver_company_supervisor_phone' => $request->driver_company_supervisor_phone,
            'driver_job_title' => $request->driver_job_title,
            'driver_work_lenght' => $request->driver_work_lenght,
            'driver_reason_for_leaving' => $request->driver_reason_for_leaving,
            'contact_company_for_reference' => $request->contact_company_for_reference,
            'driver_bank_name' => $request->driver_bank_name,
            'driver_account_number' => $request->driver_account_number,
            'driver_account_name' => $request->driver_account_name,
            'driver_bvn' => $request->driver_bvn,
            'driver_photo' => $file,
            'userType' => 'DRIVER'
        ]);

        $driver = DB::table('drivers')
        ->WHERE('email', '=', $request->email)
        ->get();

        $default_count = 12345;
        $newId = $driver[0]->id + $default_count;

        $company = 'BRK';
        $designation = 'DRV';

        $driver_id = $company . '/' .$newId .'/' .$designation;

        $updateId = Driver::find($driver[0]->id);
        $updateId->driver_id = $driver_id;
        $updateId->save();

        return response()->json($newDriver);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Driver::find($id);
        return response()->json($driver);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
