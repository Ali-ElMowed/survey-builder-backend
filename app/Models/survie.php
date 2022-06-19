<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//name is survie not survey to laravel understand
class survie extends Model
{
    use HasFactory;

    public function question(){
        return $this->hasMany(question::class,"survey_id");
    }

    public function choice(){
        return $this->hasManyThrough(choice::class,question::class);
    }
}
