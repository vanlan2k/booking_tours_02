<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function chartBar()
    {
        $data = Booking::select(DB::raw('SUM(total) as revenue'))
            ->where('booking_date', '>', Carbon::now()->subDays(30))
            ->groupBy(DB::raw('DAY(booking_date)'))
            ->get();
        $date = Booking::select('booking_date')
            ->where('booking_date', '>', Carbon::now()->subDays(30))
            ->groupBy('booking_date')
            ->get();
        return response()->json([
            'data' => $data,
            'date' => $date
        ]);
    }

    public function filterDate(Request $request)
    {
        $dateTo = Carbon::parse($request->dateTo)->format('Y-m-d');
        $dateFrom = Carbon::parse($request->dateFrom)->format('Y-m-d');
//        dd($dateTo);
        $data = Booking::select(DB::raw('SUM(total) as revenue'))
            ->whereBetween('booking_date', [$dateFrom, $dateTo])
            ->groupBy(DB::raw('DAY(booking_date)'))
            ->get();
        $date = Booking::select('booking_date')
            ->whereBetween('booking_date', [$dateFrom, $dateTo])
            ->groupBy('booking_date')
            ->get();
        return response()->json([
            'data' => $data,
            'date' => $date
        ]);
    }

    public function filterBy(Request $request)
    {
        $input = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7);
        $early_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth();
        $end_of_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth();
        $this_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth();
        $submonth = Carbon::now('Asia/Ho_Chi_Minh')->subMonths(12);
        if ($input['filter'] == 'day') {
            $data = Booking::select(DB::raw('SUM(total) as revenue'))
                ->whereBetween('booking_date', [$sub7days, $now])
                ->groupBy(DB::raw('DAY(booking_date)'))
                ->get();
            $date = Booking::select('booking_date')
                ->whereBetween('booking_date', [$sub7days, $now])
                ->groupBy('booking_date')
                ->get();
        } elseif ($input['filter'] == 'lastmonth') {
            $data = Booking::select(DB::raw('SUM(total) as revenue'))
                ->whereBetween('booking_date', [$early_last_month, $end_of_last_month])
                ->groupBy(DB::raw('DAY(booking_date)'))
                ->get();
            $date = Booking::select('booking_date')
                ->whereBetween('booking_date', [$early_last_month, $end_of_last_month])
                ->groupBy('booking_date')
                ->get();
        } elseif ($input['filter'] == 'thismonth') {
            $data = Booking::select(DB::raw('SUM(total) as revenue'))
                ->whereBetween('booking_date', [$this_month, $now])
                ->groupBy(DB::raw('DAY(booking_date)'))
                ->get();
            $date = Booking::select('booking_date')
                ->whereBetween('booking_date', [$this_month, $now])
                ->groupBy('booking_date')
                ->get();
        } else{
            $data = Booking::select(DB::raw('SUM(total) as revenue'))
                ->whereBetween(DB::raw('YEAR(booking_date)'), [$submonth->year, $now->year])
                ->groupBy(DB::raw('MONTH(booking_date)'))
                ->get();
            $date = Booking::select(DB::raw('MONTH(booking_date) as booking_date'))
                ->whereBetween(DB::raw('YEAR(booking_date)'), [$submonth->year, $now->year])
                ->groupBy(DB::raw('MONTH(booking_date)'))
                ->get();
        }
        return response()->json([
            'data' => $data,
            'date' => $date
        ]);
    }
}
