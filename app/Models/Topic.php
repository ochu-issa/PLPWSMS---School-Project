<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    //has one SchemeDetails
    public function SchemeDetails()
    {
        return $this->hasOne(LessonScheme::class, 'topic_id');
    }

    public function PlanScheme()
    {
        return $this->hasOne(PlanScheme::class, 'topic_id');
    }
}
