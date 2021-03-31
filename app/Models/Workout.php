<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function exerciseLogs()
    {
        return $this->hasMany(ExerciseLog::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
