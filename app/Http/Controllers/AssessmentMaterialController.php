<?php

namespace App\Http\Controllers;

use App\Models\AssessmentMaterial;
use App\Http\Requests\StoreAssessmentMaterialRequest;
use App\Http\Requests\UpdateAssessmentMaterialRequest;

class AssessmentMaterialController extends Controller
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
     * @param  \App\Http\Requests\StoreAssessmentMaterialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssessmentMaterialRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssessmentMaterial  $assessmentMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(AssessmentMaterial $assessmentMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssessmentMaterial  $assessmentMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(AssessmentMaterial $assessmentMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssessmentMaterialRequest  $request
     * @param  \App\Models\AssessmentMaterial  $assessmentMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssessmentMaterialRequest $request, AssessmentMaterial $assessmentMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssessmentMaterial  $assessmentMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssessmentMaterial $assessmentMaterial)
    {
        //
    }
}
