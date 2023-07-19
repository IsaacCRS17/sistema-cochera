<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vehicle_types;
use App\Http\Resources\VehicleTypeResource;
use App\Http\Requests\VehicleTypeSaveRequest;
use App\Http\Requests\VehicleTypeUpdateRequest;
class vehicle_typeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles_type = vehicle_types::where('state', 'ACTIVE')->with('getVehicles')->get();
        return VehicleTypeResource::collection($vehicles_type);
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
     *
     */
    public function store(VehicleTypeSaveRequest $request)
    {
        $vehicle_type = vehicle_types::create($request->all());
        return new VehicleTypeResource($request);
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
     * @param  \App\Models\vehicle_types $vehicle_types
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleTypeUpdateRequest $request, vehicle_types $vehicle_type)
    {
        $vehicle_type->update($request->all());
        return new VehicleTypeResource($vehicle_type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vehicle_types $vehicle_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(vehicle_types $vehicle_type)
    {
        if($vehicle_type) $vehicle_type->update(['state' => 'DELETE']);
        return response()->noContent();
    }
}
