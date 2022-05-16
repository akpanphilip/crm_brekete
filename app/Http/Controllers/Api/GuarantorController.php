<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Guarantor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuarantorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guarantor = Guarantor::orderBy('id', 'desc')->get();
        return $guarantor;

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
    public function store_guarantor1(Request $request)
    {
        $this->validate($request, [
            'driver_id' => 'required',
            'title' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'religion' => 'required',
        ]);
    }
    public function store_contact_data1(Request $request)
    {
        $this->validate($request, [
            'phone_number' => 'required',
            'email' => 'required',
            'nin' => 'required',
            'state' => 'required',
            'city' => 'required',
            'residential_address' => 'required',
            'citizenship' => 'required',
            'ex_convict' => 'required',
        ]);
    }
    public function guarantor1_work_data(Request $request)
    {
        $this->validate($request, [
            'guarantor_company_name' => 'required',
            'company_phone_number' => 'required',
            'company_website' => 'required',
            'company_address' => 'required',
            'job_title' => 'required',
            'job_level' => 'required',
            'relationship_to_applicant' => 'required',
            'company_reference' => 'required',
        ]);
    }
    public function register_guarantor1(Request $request)
    {
        $this->validate($request, [
            'driver_id' => 'required',
            'title' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email|unique:guarantors',
            'nin' => 'required|unique:guarantors',
            'state' => 'required',
            'city' => 'required',
            'residential_address' => 'required',
            'citizenship' => 'required',
            'ex_convict' => 'required',
            'guarantor_company_name' => 'required',
            'company_phone_number' => 'required',
            'company_website' => 'required',
            'company_address' => 'required',
            'job_title' => 'required',
            'job_level' => 'required',
            'relationship_to_applicant' => 'required',
            'company_reference' => 'required',
            'guarantor_photo' => 'required',
        ]);

        $img_guarantor = $request->guarantor_photo;
        $folderPath2 = public_path('/uploads');
        $image_parts_guarantor = explode(';base64,', $img_guarantor);
        $image_type_aux_guarantor = explode(
            'image/',
            $image_parts_guarantor[0]
        );
        $image_type_guarantor = $image_type_aux_guarantor[1];
        $image_base64_guarantor = base64_decode($image_parts_guarantor[1]);
        $uniqid_guarantor = uniqid();
        $guarantor_photo =
            time() . $uniqid_guarantor . '.' . $image_type_guarantor;
        file_put_contents($guarantor_photo, $image_base64_guarantor);

        return Guarantor::create([
            'title' => $request->title,
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'dob' => $request->date_of_birth,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'nin' => $request->nin,
            'state' => $request->state,
            'city' => $request->city,
            'residential_address' => $request->residential_address,
            'nigerian' => $request->citizenship,
            'ex_convict' => $request->ex_convict,
            'company_name' => $request->guarantor_company_name,
            'official_phone_number' => $request->company_phone_number,
            'website' => $request->company_website,
            'company_address' => $request->company_address,
            'job_title' => $request->job_title,
            'job_grade' => $request->job_level,
            'relationship_to_applicant' => $request->relationship_to_applicant,
            'contact_company' => $request->company_reference,
            'user_photo' => $guarantor_photo,
            'guarantor_type' => 'Guarantor 1',
            'driver_id' => $request->driver_id,
            'userType' => 'GUARANTOR'
        ]);
    }

    public function register_guarantor2(Request $request)
    {
        $this->validate($request, [
            'driver_id' => 'required',
            'title' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email|unique:guarantors',
            'nin' => 'required|unique:guarantors',
            'state' => 'required',
            'city' => 'required',
            'residential_address' => 'required',
            'citizenship' => 'required',
            'ex_convict' => 'required',
            'guarantor_company_name' => 'required',
            'company_phone_number' => 'required',
            'company_website' => 'required',
            'company_address' => 'required',
            'job_title' => 'required',
            'job_level' => 'required',
            'relationship_to_applicant' => 'required',
            'company_reference' => 'required',
            'guarantor_photo' => 'required',
        ]);

        $img_guarantor = $request->guarantor_photo;
        $folderPath2 = public_path('/uploads');
        $image_parts_guarantor = explode(';base64,', $img_guarantor);
        $image_type_aux_guarantor = explode(
            'image/',
            $image_parts_guarantor[0]
        );
        $image_type_guarantor = $image_type_aux_guarantor[1];
        $image_base64_guarantor = base64_decode($image_parts_guarantor[1]);
        $uniqid_guarantor = uniqid();
        $guarantor_photo =
            time() . $uniqid_guarantor . '.' . $image_type_guarantor;
        file_put_contents($guarantor_photo, $image_base64_guarantor);

        return Guarantor::create([
            'title' => $request->title,
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'dob' => $request->date_of_birth,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'nin' => $request->nin,
            'state' => $request->state,
            'city' => $request->city,
            'residential_address' => $request->residential_address,
            'nigerian' => $request->citizenship,
            'ex_convict' => $request->ex_convict,
            'company_name' => $request->guarantor_company_name,
            'official_phone_number' => $request->company_phone_number,
            'website' => $request->company_website,
            'company_address' => $request->company_address,
            'job_title' => $request->job_title,
            'job_grade' => $request->job_level,
            'relationship_to_applicant' => $request->relationship_to_applicant,
            'contact_company' => $request->company_reference,
            'user_photo' => $guarantor_photo,
            'guarantor_type' => 'Guarantor 2',
            'driver_id' => $request->driver_id,
            'userType' => 'GUARANTOR'
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
