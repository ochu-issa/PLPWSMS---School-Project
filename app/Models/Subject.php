<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = [];

    //hasmany Topic
    public function Topic()
    {
        return $this->hasMany(Topic::class, 'subject_id');
    }

    //hasOne lessonScheme
    public function LessonSchemeSubject()
    {
        return $this->hasOne(LessonScheme::class, 'subject_id');
    }

    //has Many HasSubject
    public function userHasSubject()
    {
        return $this->hasOne(UserHasSubject::class, 'subject_id');
    }

}
