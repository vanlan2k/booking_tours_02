<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Tour;
use Illuminate\Http\Request;
use Mockery\Exception;

class ManagerBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::orderBy('booking_date')->paginate(10);
        $data['bookings'] = $bookings;
        return view('admin.pages.bookings.list')->with($data);
    }

    public function show($id)
    {
        $booking = $this->findBooking($id);
        $data['booking'] = $booking;
        return view('admin.pages.bookings.detail')->with($data);
    }

    public function update(Request $request, $id)
    {
        try {
            $booking = $this->findBooking($id);
            $booking->status = $request->status;
            $booking->save();
            return redirect()->route('booking.index')->with(['success' => __('admin_booking.ud_cc')]);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => __('admin_booking.ud_fail')]);
        }
    }

    private function findBooking($id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return abort(404);
        }
        return $booking;
    }
}
