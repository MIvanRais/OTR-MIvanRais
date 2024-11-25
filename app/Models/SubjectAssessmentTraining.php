<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectAssessmentTraining extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function assessment_materials(){
        return $this->hasMany(AssessmentMaterial::class);
    }
}