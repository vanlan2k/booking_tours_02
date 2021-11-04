<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChartService
{
    public function indexHome()
    {
        $dateStart = Carbon::now()->startOfMonth();
        $now = Carbon::now();
        $bookings = Booking::selectNumberBooking($dateStart, $now);
        $revenue = Booking::sumRevenue($dateStart, $now);
        $register = User::sumRegister($dateStart, $now);
        $data['number_booking'] = $bookings->number_booking;
        $data['revenue'] = $revenue->first() ? $revenue->revenue : 0;
        $data['register'] = $register->first() ? $register->register : 0;
        return $data;
    }

    private function filterYear($now)
    {
        $submonth = Carbon::now()->subMonths(12);
        $date = [];
        $data = [];
        do {
            array_push($date, $this->formatMonth($submonth));
            $value = Booking::filterYear($submonth->year, $submonth->month);
            $submonth->addMonth();
            array_push($data, $value);
        } while ($submonth->lte($now));
        $result['data'] = $data;
        $result['date'] = $date;
        return $result;
    }

    private function filterThisMonth($now)
    {
        $this_month = Carbon::now()->startOfMonth();
        $result = $this->filterFunction($this_month, $now);
        return $result;
    }

    private function filterLastMonth()
    {
        $early_last_month = Carbon::now()->subMonth()->startOfMonth();
        $end_of_last_month = Carbon::now()->subMonth()->endOfMonth();
        $result = $this->filterFunction($early_last_month, $end_of_last_month);
        return $result;
    }

    private function filterDay($now)
    {
        $sub7days = Carbon::now()->subDays(7);
        $result = $this->filterFunction($sub7days, $now);
        return $result;
    }

    public function filterBy($input)
    {
        $now = Carbon::now();
        if ($input['filter'] == 'day') {
            $result = $this->filterDay($now);
        } elseif ($input['filter'] == 'lastmonth') {
            $result = $this->filterLastMonth();
        } elseif ($input['filter'] == 'thismonth') {
            $result = $this->filterThisMonth($now);
        } else {
            $result = $this->filterYear($now);
        }
        return $result;
    }

    public function filterDate(Request $request)
    {
        $dateTo = Carbon::parse($request->dateTo);
        $dateFrom = Carbon::parse($request->dateFrom);
        $result = $this->filterFunction($dateFrom, $dateTo);
        return $result;
    }

    public function chartBar()
    {
        $sub30Days = Carbon::now()->subDays(30);
        $now = Carbon::now();
        $result = $this->filterFunction($sub30Days, $now);
        return $result;
    }

    private function formatDate($input)
    {
        return $input->format('Y-m-d');
    }

    private function formatMonth($input)
    {
        return $input->format('Y-m');
    }

    private function filterFunction($dateStart, $dateEnd)
    {
        $date = [];
        $data = [];
        do {
            array_push($date, $this->formatDate($dateStart));
            $value = Booking::filterDay($this->formatDate($dateStart));
            $dateStart->addDay();
            array_push($data, $value);
        } while ($dateStart->lte($dateEnd));
        $result['data'] = $data;
        $result['date'] = $date;
        return $result;
    }
    public function exportExcel()
    {
        $this_month = Carbon::now()->startOfMonth();
        $now = Carbon::now();
        $data = [];
        $date = [];
        do {
            array_push($date, $this->formatDate($this_month));
            $value = Booking::filterDay($this->formatDate($this_month));
            $this_month->addDay();
            array_push($data, $value);
        } while ($this_month->lte($now));
        $result['data'] = $data;
        $result['date'] = $date;
        return $result;
    }
}
