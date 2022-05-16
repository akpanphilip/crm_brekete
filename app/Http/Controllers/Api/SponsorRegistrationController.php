<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SponsorRegistrationController extends Controller
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
            'email' => 'required|email|unique:sponsors',
            'nin' => 'required|unique:sponsors|numeric|digits:11',
            'state' => 'required',
            'city' => 'required',
            'residential_address' => 'required|max:80',
            'citizenship' => 'required',
            'ex_convict' => 'required',
        ]);
    }
    public function bank_details(Request $request)
    {
        $request->validate([
            'bank_name' => 'required',
            'account_number' => 'required',
            'account_name' => 'required',
            'bank_verification_number' => 'required|numeric|digits:11',
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'last_name' => 'required',
            'first_name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:sponsors',
            'nin' => 'required|unique:sponsors|numeric|digits:11',
            'state' => 'required',
            'city' => 'required',
            'residential_address' => 'required|max:80',
            'citizenship' => 'required',
            'ex_convict' => 'required',
            'bank_name' => 'required',
            'account_number' => 'required',
            'account_name' => 'required',
            'bank_verification_number' => 'required|numeric|digits:11',
            'sponsor_photo' => 'required',
        ]);


        $img_sponsor = $request->sponsor_photo;
        $folderPath2 = public_path('/uploads');
        $image_parts_sponsor = explode(';base64,', $img_sponsor);
        $image_type_aux_sponsor = explode('image/', $image_parts_sponsor[0]);
        $image_type_sponsor = $image_type_aux_sponsor[1];
        $image_base64_sponsor = base64_decode($image_parts_sponsor[1]);
        $uniqid_sponsor = uniqid();
        $sponsorPhoto = time() . $uniqid_sponsor . '.' . $image_type_sponsor;
        file_put_contents($sponsorPhoto, $image_base64_sponsor);


        $newSponsor = Sponsor::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'dob' => $request->date_of_birth,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'nin' => $request->nin,
            'state' => $request->state,
            'city' => $request->city,
            'residential_address' => $request->residential_address,
            'nigerian' => $request->citizenship,
            'ex-convict' => $request->ex_convict    ,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
            'bvn' => $request->bank_verification_number,
            'photo' => $sponsorPhoto,
            'userType' => 'SPONSOR'
        ]);

        $sponsor = DB::table('sponsors')
        ->WHERE('email', '=', $request->email)
        ->get();

        $default_count = 12345;
        $newId = $sponsor[0]->id + $default_count;

        $company = 'BRK';
        $designation = 'SPR';

        $sponsor_id = $company . '/' .$newId .'/' .$designation;

        $updateId = Sponsor::find($sponsor[0]->id);
        $updateId->sponsor_id = $sponsor_id;
        $updateId->save();

        return response()->json($newSponsor);
    }

    public function index()
    {
        $sponsors = Sponsor::orderBy('id', 'desc')->get();
        return $sponsors;

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



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sponsor = Sponsor::find($id);
        return response()->json($sponsor);
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
