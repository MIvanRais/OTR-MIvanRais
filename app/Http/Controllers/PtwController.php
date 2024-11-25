<?php

namespace App\Http\Controllers;

use App\Models\Ptw;
use Illuminate\Http\Request;
use App\Http\Requests\StorePtwRequest;
use App\Http\Requests\UpdatePtwRequest;
use App\Models\AircraftType;
use App\Models\AssessmentMaterial;
use App\Models\BasicLicense;
use App\Models\Laca;
use App\Models\MandatoryTraining;
use App\Models\Status;
use App\Models\SubjectAssessmentTraining;
use App\Models\SubjetMandatoryTraining;
use DateTime;
use App\Models\Training;

class PtwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_role = Auth()->user()->role->name;
        switch ($user_role) {
            case 'Engineer':
                $ptws = Ptw::where('user_id', Auth()->user()->id)->get();
                break;
            case 'PIC':
                $ptws = Ptw::where('flag', 1)->get();
                break;
            case 'Quality Inspector':
                $ptws = Ptw::where('flag', 2)->get();
                break;
        }
        
        return view('ptw.index', compact('ptws'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ptw.create');
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
            'status' => 'required|in:initial,additional,renewal',
            'no' => 'required|string|max:255',
            'validy' => 'required|string|max:255',
            'scope' => 'required|in:mr,rii,etops',
            'name' => 'required|array|min:1',
            'name.*' => 'required|string|max:255',
            'last_performed_year_human' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'last_performed_year_sms' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'last_performed_year_rvsm' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'last_performed_year_etops' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'last_performed_year_rii' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
        ]);

        $subject_assessment_training = SubjetMandatoryTraining::all();

        $new_ptw = Ptw::create([
            'flag'=>0, 
            'user_id'=>Auth()->user()->id,
            'status_id'=>null
        ]);

        Laca::create([
            'status'=>$validated['status'],
            'no'=>$validated['no'],
            'validy'=>$validated['validy'],
            'scope'=>$validated['scope'],
            'ptw_id'=>$new_ptw->id
        ]);

        foreach ($validated['name'] as $aircraftName) {
            AircraftType::create([
                'name' => $aircraftName,
                'ptw_id' => $new_ptw->id
            ]);
        }

        MandatoryTraining::create([
            'last_performed_year'=>$validated['last_performed_year_human'], 
            'subject_mandatory_training_id'=>$subject_assessment_training[0]->id,
            'ptw_id'=>$new_ptw->id
        ]);
        MandatoryTraining::create([
            'last_performed_year'=>$validated['last_performed_year_sms'], 
            'subject_mandatory_training_id'=>$subject_assessment_training[1]->id,
            'ptw_id'=>$new_ptw->id
        ]);
        MandatoryTraining::create([
            'last_performed_year'=>$validated['last_performed_year_rvsm'], 
            'subject_mandatory_training_id'=>$subject_assessment_training[2]->id,
            'ptw_id'=>$new_ptw->id
        ]);
        MandatoryTraining::create([
            'last_performed_year'=>$validated['last_performed_year_etops'], 
            'subject_mandatory_training_id'=>$subject_assessment_training[3]->id,
            'ptw_id'=>$new_ptw->id
        ]);
        MandatoryTraining::create([
            'last_performed_year'=>$validated['last_performed_year_rii'], 
            'subject_mandatory_training_id'=>$subject_assessment_training[4]->id,
            'ptw_id'=>$new_ptw->id
        ]);

        $new_status = Status::create([
            'name'=>'Proposal',
            'date'=> now(),
            'ptw_id'=>$new_ptw->id
        ]);

        $new_ptw->update(['status_id' => $new_status->id]);
        
        $trainings = Training::where('user_id',Auth()->user()->id)->get();
        $trainings->each(function($training) use ($new_ptw){
            if (!$training->ptw_id) {
                Training::create([
                    'course' => $training->course,
                    'year' => $training->year,
                    'user_id' => Auth()->user()->id,
                    'ptw_id' => $new_ptw->id
                ]);
            }
        });

        $basic_licenses = BasicLicense::where('user_id',Auth()->user()->id)->get();
        $basic_licenses->each(function($basic_license) use ($new_ptw){
            if (!$basic_license->ptw_id) {
                BasicLicense::create([
                    'category' => $basic_license->category,
                    'card_no' => $basic_license->card_no,
                    'user_id' => auth()->id(), 
                    'ptw_id' => $new_ptw->id
                ]);
            }
        });

        return redirect()->route('ptw.index')
                        ->with('success', 'PTW created successfully.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ptw  $ptw
     * @return \Illuminate\Http\Response
     */
    public function show(Ptw $ptw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ptw  $ptw
     * @return \Illuminate\Http\Response
     */
    public function edit(Ptw $ptw)
    {
        // dd($ptw->mandatory_trainings[0]->last_performed_year);
        return view('ptw.edit', compact('ptw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ptw  $ptw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ptw $ptw)
    {
        $validated = $request->validate([
            'status' => 'required|in:initial,additional,renewal',
            'no' => 'required|string|max:255',
            'validy' => 'required|string|max:255',
            'scope' => 'required|in:mr,rii,etops',
            'name' => 'required|array|min:1',
            'name.*' => 'required|string|max:255',
            'last_performed_year_human' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'last_performed_year_sms' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'last_performed_year_rvsm' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'last_performed_year_etops' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'last_performed_year_rii' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
        ]);

        $subject_assessment_training = SubjetMandatoryTraining::all();

        $laca = $ptw->laca->first();
        $laca->update([
            'status' => $validated['status'],
            'no' => $validated['no'],
            'validy' => $validated['validy'],
            'scope' => $validated['scope'],
        ]);

        $aircraft_types = $ptw->aircraft_types;
        $aircraft_types->each(function($aircraft_type) {
            $aircraft_type->delete();
        });
        foreach ($validated['name'] as $aircraftName) {
            AircraftType::create([
                'name' => $aircraftName,
                'ptw_id' => $ptw->id
            ]);
        }

        $mandatory_trainings = $ptw->mandatory_trainings;
        $mandatory_trainings->each(function($mandatory_training) {
            $mandatory_training->delete();
        });

        MandatoryTraining::create([
            'last_performed_year'=>$validated['last_performed_year_human'], 
            'subject_mandatory_training_id'=>$subject_assessment_training[0]->id,
            'ptw_id'=>$ptw->id
        ]);
        MandatoryTraining::create([
            'last_performed_year'=>$validated['last_performed_year_sms'], 
            'subject_mandatory_training_id'=>$subject_assessment_training[1]->id,
            'ptw_id'=>$ptw->id
        ]);
        MandatoryTraining::create([
            'last_performed_year'=>$validated['last_performed_year_rvsm'], 
            'subject_mandatory_training_id'=>$subject_assessment_training[2]->id,
            'ptw_id'=>$ptw->id
        ]);
        MandatoryTraining::create([
            'last_performed_year'=>$validated['last_performed_year_etops'], 
            'subject_mandatory_training_id'=>$subject_assessment_training[3]->id,
            'ptw_id'=>$ptw->id
        ]);
        MandatoryTraining::create([
            'last_performed_year'=>$validated['last_performed_year_rii'], 
            'subject_mandatory_training_id'=>$subject_assessment_training[4]->id,
            'ptw_id'=>$ptw->id
        ]);

        $status = $ptw->statuses[0];
        $status->update([
            'date' => now()
        ]);

        return redirect()->route('ptw.index')->with('success', 'PTW updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ptw  $ptw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ptw $ptw)
    {
        $trainings = Training::find(Auth()->user()->id)
                                ->where('ptw_id', $ptw->id)
                                ->get();
        $trainings->each(function($training){
            $training->delete();
        });

        $basic_licenses = BasicLicense::find(Auth()->user()->id)
                                        ->where('ptw_id', $ptw->id)
                                        ->get();
        $basic_licenses->each(function($basic_license){
            $basic_license->delete();
        });

        $laca = Laca::where('ptw_id', $ptw->id)->first();
        $laca->delete();
        
        $aircraft_types = AircraftType::where('ptw_id', $ptw->id)->get();
        $aircraft_types->each(function($aircraft_type){
            $aircraft_type->delete();
        });

        $mandatory_trainings = MandatoryTraining::where('ptw_id', $ptw->id)->get();
        $mandatory_trainings->each(function($mandatory_training){
            $mandatory_training->delete();
        });

        $status = Status::where('ptw_id', $ptw->id)->first();
        $status->delete();

        $ptw->delete();

        return redirect()->route('ptw.index')
                         ->with('success', 'PTW deleted successfully.');
    }

    public function send($id){
        $ptw = Ptw::find($id);
        $ptw->update(['flag' => 1]);
        switch (Auth()->user()->role->name) {
            case 'Engineer':
                $send_to = 'PIC';
                break;
            case 'PIC':
                $send_to = 'Quality Inspector';
                break;
        }

        return redirect()->route('ptw.index')
                         ->with('success', 'PTW sent to ' . $send_to . ' successfully.');
    }

    public function verificationok($id){
        $ptw = Ptw::find($id);
        $ptw->update(['flag' => 2]);
        Status::create([
            'name'=>'Verification',
            'date'=> now(),
            'ptw_id'=>$ptw->id
        ]);

        return redirect()->route('ptw.index')
                         ->with('success', 'Verification PTW successfully.');

    }
    public function verificationreject($id){
        $ptw = Ptw::find($id);
        // $ptw->update(['flag' => 2]);
        Status::create([
            'name'=>'Rejection',
            'date'=> now(),
            'ptw_id'=>$ptw->id
        ]);

        return redirect()->route('ptw.index')
                         ->with('success', 'Verification PTW successfully.');
    }

    public function assessment($id){
        // dd($id);
        $ptw = Ptw::find($id);
        return view('ptw.assessment', compact('ptw'));
    }
    
    public function evaluate(Request $request, $id){
        // dd($id);
        // dd($request->value);
        // dd($this->calculateCombinedAssessmentValue($request->value));
        $ptw = Ptw::find($id);
        $validatedData = $request->validate([
            'value' => 'required|array', // Ensures `value` is an array
            'value.*' => 'required|integer|between:0,100', // Validates each element of the `value` array
        ]);

        foreach ($validatedData['value'] as $index => $data) {
            AssessmentMaterial::create([
                'value' => $data, 
                'ptw_id'=> $ptw->id, 
                'subject_assessment_material_id' => $index + 1
            ]);
        }

        $result = $this->calculateCombinedAssessmentValue($validatedData['value']);
        Status::create([
            'name' => 'Assessment',
            'result' => $result,
            'date' => now(),
            'ptw_id' => $ptw->id 
        ]);

        return redirect()->route('ptw.index')
                         ->with('success', 'Evaluate PTW successfully.');
    }

    public function calculateCombinedAssessmentValue(array $values)
    {
        $totalPercentage = 0;

        foreach ($values as $index => $value) {
            // Calculate the percentage for each value
            $percentage = ($value / 100) * 100;

            // Add to the total percentage
            $totalPercentage += $percentage;
        }

        // Calculate the average percentage
        $combinedPercentage = $totalPercentage / count($values);

        // Constrain the result between 0% and 100%
        return min(max($combinedPercentage, 0), 100);
    }
}