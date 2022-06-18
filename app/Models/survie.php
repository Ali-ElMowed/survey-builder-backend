<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survie extends Model
{
    use HasFactory;

    public function question(){
        return $this->hasMany(question::class,"survey_id");
    }
}
