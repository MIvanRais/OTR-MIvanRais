<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laca extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ptw(){
        return $this->belongsTo(Ptw::class);
    }
}