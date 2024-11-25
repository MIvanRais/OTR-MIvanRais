<?php

namespace App\Http\Controllers;

use App\Models\AircraftType;
use App\Http\Requests\StoreAircraftTypeRequest;
use App\Http\Requests\UpdateAircraftTypeRequest;

class AircraftTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreAircraftTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAircraftTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AircraftType  $aircraftType
     * @return \Illuminate\Http\Response
     */
    public function show(AircraftType $aircraftType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AircraftType  $aircraftType
     * @return \Illuminate\Http\Response
     */
    public function edit(AircraftType $aircraftType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAircraftTypeRequest  $request
     * @param  \App\Models\AircraftType  $aircraftType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAircraftTypeRequest $request, AircraftType $aircraftType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AircraftType  $aircraftType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AircraftType $aircraftType)
    {
        //
    }
}
