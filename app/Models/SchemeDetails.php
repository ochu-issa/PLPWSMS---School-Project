<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchemeDetails extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function Topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function LessonScheme()
    {
        return $this->belongsTo(LessonScheme::class, 'scheme_id');
    }
}
