<?php

namespace App\Http\Controllers;

use App\Models\MandatoryTraining;
use App\Http\Requests\StoreMandatoryTrainingRequest;
use App\Http\Requests\UpdateMandatoryTrainingRequest;

class MandatoryTrainingController extends Controller
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
     * @param  \App\Http\Requests\StoreMandatoryTrainingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMandatoryTrainingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MandatoryTraining  $mandatoryTraining
     * @return \Illuminate\Http\Response
     */
    public function show(MandatoryTraining $mandatoryTraining)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MandatoryTraining  $mandatoryTraining
     * @return \Illuminate\Http\Response
     */
    public function edit(MandatoryTraining $mandatoryTraining)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMandatoryTrainingRequest  $request
     * @param  \App\Models\MandatoryTraining  $mandatoryTraining
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMandatoryTrainingRequest $request, MandatoryTraining $mandatoryTraining)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MandatoryTraining  $mandatoryTraining
     * @return \Illuminate\Http\Response
     */
    public function destroy(MandatoryTraining $mandatoryTraining)
    {
        //
    }
}
