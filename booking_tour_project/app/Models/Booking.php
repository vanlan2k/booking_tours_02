<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    public static $status = [
        "0" => "Chưa thanh toán",
        "1" => "Đã thanh toán",
        "2" => "Quá hạn",
    ];
    public static $payment = [
        "0" => "Tiền mặt",
        "1" => "ATM/Internet Bacnking",
        "2" => "Đã hủy"
    ];
    public function booking_detail()
    {
        return $this->hasMany(BookingDetail::class, 'booking_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function scopeFilterDay($query, $day)
    {
        $data = $query->select(DB::raw('SUM(total) as revenue'))
            ->where('booking_date', $day)
            ->first();
        return $data['revenue'] ? $data['revenue'] : 0;
    }
    public function scopeFilterYear($query, $year, $month)
    {
        $data = $query->select(DB::raw('SUM(total) as revenue'))
            ->whereYear('booking_date', $year)
            ->whereMonth('booking_date', $month)
            ->first();
        return $data['revenue'] ? $data['revenue'] : 0;
    }
    public function scopeSelectNumberBooking($query, $dateStart, $now){
        return $query->select(DB::raw('COUNT("id") as number_booking'))
            ->whereBetween('booking_date', [$dateStart, $now])
            ->first();
    }
    public function scopeSumRevenue($query, $dateStart, $now){
        return $query->select(DB::raw('SUM(total) as revenue'))
            ->whereBetween('booking_date', [$dateStart, $now])
            ->where('status', 1)
            ->where('payment', '!=', 2)
            ->groupBy(DB::raw('MONTH(booking_date)'))
            ->first();
    }
    public function scopeSumRevenueDay($query){
        $value =  $query->select(DB::raw('SUM(total) as revenue'))
            ->where('booking_date', '=' , Carbon::now()->format('Y-m-d'))
            ->first();
        return $value->revenue ? $value->revenue : 0;
    }
    public function scopeSumRevenueMonth($query){
        $early_last_month = Carbon::now()->subMonth()->startOfMonth();
        $end_of_last_month = Carbon::now()->subMonth()->endOfMonth();
        $value =  $query->select(DB::raw('SUM(total) as revenue'))
            ->whereBetween('booking_date', [$early_last_month, $end_of_last_month])
            ->first();
        return $value->revenue ? $value->revenue : 0;
    }
}
