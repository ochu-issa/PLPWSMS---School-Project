<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanScheme extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }
}
