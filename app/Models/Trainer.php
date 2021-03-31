<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }
}
