<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentMaterial extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subject_assessment_trainnig(){
        return $this->belongsTo(SubjectAssessmentTraining::class);
    }

    public function ptw(){
        return $this->belongsTo(Ptw::class);
    }
}