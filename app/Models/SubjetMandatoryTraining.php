<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjetMandatoryTraining extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mandatory_trainings(){
        return $this->hasMany(MandatoryTraining::class);
    }
}