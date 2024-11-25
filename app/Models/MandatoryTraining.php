<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MandatoryTraining extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ptw(){
        return $this->belongsTo(Ptw::class);
    }

    public function subject_madatory_training(){
        return $this->belongsTo(SubjetMandatoryTraining::class);
    }
}