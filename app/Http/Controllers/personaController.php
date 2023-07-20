<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personas;
use App\Http\Resources\PersonasResource;
use App\Http\Requests\PersonasSaveRequest;
use App\Http\Requests\PersonasUpdateRequest;

class personaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas= personas::where('state','ACTIVE')->with('getVehicles')->get();
        return PersonasResource::collection($personas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response

     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonasSaveRequest $request)
    {
        
        $persona=personas::create($request->all());

      return new PersonasResource($request);

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
     * @param  \App\Models\personas $personas
     * @return \Illuminate\Http\Response
     */
    public function update(PersonasUpdateRequest $request, personas $persona)
    {
       $persona->update($request->all());
       return new PersonasResource($persona);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy(personas $persona)
    {
        if($persona) $persona->update(['state'=>'DELETE']);
        return response()->noContent();
    }
}
