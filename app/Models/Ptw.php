<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ptw extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function trainings(){
        return $this->hasMany(Training::class);
    }
    
    public function basic_licenses(){
        return $this->hasMany(BasicLicense::class);
    }

    public function ame_license(){
        return $this->belongsTo(AmeLicense::class);
    }

    public function aircraft_types(){
        return $this->hasMany(AircraftType::class);
    }

    public function laca(){
        return $this->hasMany(Laca::class);
    }

    public function mandatory_trainings(){
        return $this->hasMany(MandatoryTraining::class);
    }
    
    public function statuses(){
        return $this->hasMany(Status::class);
    }

    public function assessment_materials(){
        return $this->hasMany(AssessmentMaterial::class);
    }
}