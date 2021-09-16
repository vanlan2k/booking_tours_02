<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;
    protected $table = 'booking_details';
    public function booking(){
        return $this->belongsTo(Booking::class, 'booking_id', 'id');
    }
    public function tour(){
        return $this->hasMany(Tour::class, 'tour_id', 'id');
    }
}
