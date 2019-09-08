<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function studyOptions()
    {
        return $this->belongsToMany('\App\StudyOption');
    }
}
