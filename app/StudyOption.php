<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyOption extends Model
{
    public function skills()
    {
        return $this->belongsToMany('\App\Skill');
    }
}
