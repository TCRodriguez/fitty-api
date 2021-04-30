<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id');
    }

    public function workouts()
    {
        return $this->hasMany(Workout::class);
    }

    public function exerciseLogs()
    {
        return $this->hasManyThrough(ExerciseLog::class, Workout::class);
    }
}
