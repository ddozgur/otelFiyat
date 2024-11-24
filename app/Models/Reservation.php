<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }    

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function payments()
    {
        return $this->hasMany(Payment::class, 'reservation_id'); // payment modelinde reservation_id kolonuyla ilişki kuruyoruz
    }

}

