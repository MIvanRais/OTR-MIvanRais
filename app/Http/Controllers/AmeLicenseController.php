<?php

namespace App\Http\Controllers;

use App\Models\AmeLicense;
use Illuminate\Http\Request;

class AmeLicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ameLicenses = AmeLicense::where('user_id', Auth()->user()->id)->get();
        $isAddButtonVisible = !!count($ameLicenses);
        return view('ame-license.index', compact('ameLicenses', 'isAddButtonVisible'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ame-license.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ame_license_no' => 'required|string|max:255|unique:ame_licenses',
            'vut' => 'required|string|max:255|unique:ame_licenses',
        ]);
        
        AmeLicense::create([
            'ame_license_no' => $validated['ame_license_no'],
            'vut' => $validated['vut'],
            'user_id' => auth()->id(), 
        ]);
    
        return redirect()->route('ame-license.index')
                         ->with('success', 'AME License created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AmeLicense  $ameLicense
     * @return \Illuminate\Http\Response
     */
    public function show(AmeLicense $ameLicense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AmeLicense  $ameLicense
     * @return \Illuminate\Http\Response
     */
    public function edit(AmeLicense $ameLicense)
    {
        return view('ame-license.edit', ['ameLicense'=>$ameLicense]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AmeLicense  $ameLicense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AmeLicense $ameLicense)
    {
        $validated = $request->validate([
            'ame_license_no' => 'required|string|max:255|unique:ame_licenses',
            'vut' => 'required|string|max:255|unique:ame_licenses',
        ]);
        
        $ameLicense->update($validated);

        return redirect()->route('ame-license.index')
                         ->with('success', 'AME License updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AmeLicense  $ameLicense
     * @return \Illuminate\Http\Response
     */
    public function destroy(AmeLicense $ameLicense)
    {
        $ameLicense->delete();

        return redirect()->route('ame-license.index')
                         ->with('success', 'AME License deleted successfully.');
    }
}