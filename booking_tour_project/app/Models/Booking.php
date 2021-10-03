<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    public static $status = [
        "1" => "Paid",
        "0" => "Unpaid",
    ];
    public static $payment = [
        "0" => "Cash",
        "1" => "ATM/Internet Bacnking",
    ];
    public function booking_detail()
    {
        return $this->hasMany(BookingDetail::class, 'booking_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
}
