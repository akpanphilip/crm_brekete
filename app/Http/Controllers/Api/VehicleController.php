<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::orderBy('id', 'desc')->get();
        return $vehicles;
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
            'license_plate' => 'required|min:8',
            'type' => 'required',
            'model' => 'required',
            'side_number' => 'required|numeric',
            'year' => 'required|numeric|digits:4',
            'chassis' => 'required|max:20',
            'body' => 'required',
            'engine' => 'required',
            'transmission' => 'required',
            'color' => 'required',
        ]);

        $newVehicle = Vehicle::create([
            'license_plate' => $request->license_plate,
            'type' => $request->type,
            'model' => $request->model,
            'side_number' => $request->side_number,
            'year' => $request->year,
            'chassis' => $request->chassis,
            'body' => $request->body,
            'engine' => $request->engine,
            'transmission' => $request->transmission,
            'color' => $request->color,
        ]);
        return response()->json($newVehicle);
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
        $request->validate([
            'license_plate' => 'required|min:8',
            'type' => 'required',
            'model' => 'required',
            'side_number' => 'required|numeric',
            'year' => 'required|numeric|digits:4',
            'chassis' => 'required',
            'body' => 'required',
            'engine' => 'required',
            'transmission' => 'required',
            'color' => 'required',
        ]);
        $updateVehicle = Vehicle::find($id);
        $updateVehicle->license_plate = $request->license_plate;
        $updateVehicle->type = $request->type;
        $updateVehicle->model = $request->model;
        $updateVehicle->side_number = $request->side_number;
        $updateVehicle->year = $request->year;
        $updateVehicle->chassis = $request->chassis;
        $updateVehicle->body = $request->body;
        $updateVehicle->engine = $request->engine;
        $updateVehicle->transmission = $request->transmission;
        $updateVehicle->color = $request->color;

        $updateVehicle->save();
        return response()->json($updateVehicle);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        return response()->json('Vehicle deleted');
    }
}
