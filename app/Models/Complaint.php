<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    
    public function users(){
        return $this->belongsTo(User::class, 'userID');
    }

    public function room(){
        return $this->belongsTo(Room::class, 'roomID');
    }
}
