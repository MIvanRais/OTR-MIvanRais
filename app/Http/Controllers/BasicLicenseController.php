<?php

namespace App\Http\Controllers;

use App\Models\BasicLicense;
use Illuminate\Http\Request;

class BasicLicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $basicLicenses = BasicLicense::where('user_id', Auth()->user()->id)
                                        ->where('ptw_id', null)                                
                                        ->get();
        return view('basic-license.index', compact('basicLicenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('basic-license.create');
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
            'category' => 'required|array',
            'category.*' => 'required|string|max:255|distinct',
            'card_no' => 'required|array',
            'card_no.*' => 'required|string|max:255|distinct|',
        ]);
    
        foreach ($validated['category'] as $index => $category) {
            BasicLicense::create([
                'category' => $category,
                'card_no' => $validated['card_no'][$index],
                'user_id' => auth()->id(), 
            ]);
        }
    
        return redirect()->route('basic-license.index')
                         ->with('success', 'Basic License created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BasicLicense  $basicLicense
     * @return \Illuminate\Http\Response
     */
    public function show(BasicLicense $basicLicense)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BasicLicense  $basicLicense
     * @return \Illuminate\Http\Response
     */
    public function edit(BasicLicense $basicLicense)
    {
        return view('basic-license.edit', ['basicLicense'=>$basicLicense]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BasicLicense  $basicLicense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BasicLicense $basicLicense)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255', 
            'card_no' => 'required|string|max:255', 
        ]);
        
        $basicLicense->update($validated);

        return redirect()->route('basic-license.index')
                         ->with('success', 'Basic License updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BasicLicense  $basicLicense
     * @return \Illuminate\Http\Response
     */
    public function destroy(BasicLicense $basicLicense)
    {
        $basicLicense->delete();

        return redirect()->route('basic-license.index')
                         ->with('success', 'Basic License deleted successfully.');
    }
}