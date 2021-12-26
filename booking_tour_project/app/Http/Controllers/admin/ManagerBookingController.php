<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mockery\Exception;

class ManagerBookingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search) {
            $bookings = Booking::where('booking_no', '=', $request->search)->orderBy('booking_date', 'DESC')->paginate(10);
        } else {
            $bookings = Booking::join('booking_details', 'booking_details.booking_id', '=', 'bookings.id')
                ->join('tours', 'tours.id', '=', 'booking_details.tour_id')
                ->where('date_start', '>=', (Carbon::now())->format('Y-m-d'))
                ->orderBy('booking_date', 'DESC')
                ->orderBY('bookings.id', 'DESC')
                ->select('bookings.*')
                ->paginate(10);
        }
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
