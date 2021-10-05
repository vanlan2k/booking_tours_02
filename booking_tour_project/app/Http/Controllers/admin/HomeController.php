<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $dayStar = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth();
        $now = Carbon::now();
        $bookings =  Booking::select(DB::raw('COUNT("id") as number_booking'))
            ->whereBetween('booking_date', [$dayStar, $now])
            ->first();

        $revenue = Booking::select(DB::raw('SUM(total) as revenue'))
            ->whereBetween('booking_date', [$dayStar, $now])
            ->groupBy(DB::raw('MONTH(booking_date)'))
            ->first();

        $register =  User::select(DB::raw('COUNT("id") as register'))
            ->whereBetween('created_at', [$dayStar, $now])
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->first();

        $data['number_booking'] = $bookings->number_booking;
        $data['revenue'] = $revenue->revenue;
        $data['register'] = $register->register;
        return view('admin.dashboard')->with($data);
    }
}
