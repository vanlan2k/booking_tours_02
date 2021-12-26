<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Jobs\CancelBoookingMailJobs;
use App\Models\Booking;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class YouReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::where('customer_id', Auth::user()->id)->get();
        $data['reviews'] = $reviews;
        return view('web.pages.review')->with($data);
    }

    public function yourBooking()
    {
        $id_user = Auth::user()->id;
        $data['bookings'] = Booking::where('payment', '!=' , 2)->where('customer_id', $id_user)->orderBy('created_at', 'DESC')->paginate(10);
        return view('web.pages.your-booking')->with($data);
    }

    public function yourBookingCancel($id)
    {
        DB::beginTransaction();
        try {
            $booking = Booking::findOrFail($id);
            $booking->payment = 2;
            $booking->save();
            DB::commit();
            dispatch(new CancelBoookingMailJobs($id));
            return response()->json([
               'error' => false
            ]);
        }
        catch (\Exception $e){
            DB::rollBack();
            return response()->json([
                'error' => true
            ]);
        }
    }
}
