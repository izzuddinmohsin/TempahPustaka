<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

        
    public function booking(){
        return $this->hasMany(Booking::class);
    }

    public function complaint(){
        return $this->hasMany(Complaint::class);
    }
}
