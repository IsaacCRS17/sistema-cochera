<?php

namespace App\Http\Controllers;
use App\Http\Requests\VehicleSaveRequest;
use App\Http\Requests\VehicleUpdateRequest;
use App\Http\Resources\VehicleResource;
use Illuminate\Http\Request;
use App\Models\vehicles;

class vehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = vehicles::where('state', 'ACTIVE')->get();
        return VehicleResource::collection( $result);
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
    public function store(VehicleSaveRequest $request)
    {
        $vehicles = vehicles::create($request->all());

        return new VehicleResource($vehicles);
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
     * @param  \App\Models\vehicles $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleUpdateRequest $request,vehicles $vehicle)
    {
        $vehicle->update($request->all());
        return new VehicleResource($vehicle);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vehicles $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(vehicles $vehicle)
    {
        if($vehicle) $vehicle->update(['state' => 'DELETE']);
        return response()->noContent();
    }
}
