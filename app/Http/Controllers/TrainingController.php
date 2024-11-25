<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = Training::where('user_id', Auth()->user()->id)
                                ->where('ptw_id', null)
                                ->get();

        return view('training.index', ['trainings'=>$trainings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('training.create');
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
            // 'course' => 'required|array|unique:trainings', // Validate that 'course' is an array
            'course' => 'required|array', // Validate that 'course' is an array
            'course.*' => 'required|string|max:255|distinct', // Each course should be a distinct string
            'year' => 'required|array', // Validate that 'year' is an array
            'year.*' => 'required|integer|digits:4|min:2000|max:'.(date('Y')), // Each year should be a valid 4-digit number
        ]);
        
        foreach ($validated['course'] as $index => $course) {
            Training::create([
                'course' => $course,
                'year' => $validated['year'][$index],
                'user_id' => Auth()->user()->id,
            ]);
        }

        return redirect()->route('training.index')
                        ->with('success', 'Trainings created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        return view('training.edit', ['training'=>$training]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        $validated = $request->validate([
            'course' => 'required|string|max:255|distinct', // Each course should be a distinct string
            'year' => 'required|integer|digits:4|min:2000|max:'.(date('Y')), // Each year should be a valid 4-digit number
        ]);
        
        $training->update($validated);

        return redirect()->route('training.index')
                         ->with('success', 'Training updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        $training->delete();

        return redirect()->route('training.index')
                         ->with('success', 'Training deleted successfully.');
    }
}