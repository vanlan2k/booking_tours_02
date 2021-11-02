<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\web\BookingRequest;
use App\Models\Cart;
use App\Models\Tour;
use App\Services\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function createBooking(Request $request)
    {
        if ($request->payment) {
            $cart = new Cart();
            $cart->cart['status'] = 1;
            session()->put('cart', $cart->cart);
        }
        $booking = new BookingService();
        $check = $booking->addBookingTour();
        if ($request->payment) {
            if ($check) {
                return response()->json([
                    'error' => false
                ]);
            } else {
                return response()->json([
                    'error' => true
                ]);
            }
        } else {
            if ($check) {
                return redirect('/')->with(['success' => __('checkout.create_cc')]);
            } else {
                return redirect()->back()->with(['success' => __('checkout.create_faild')]);
            }
        }
    }

    public function addCart(BookingRequest $request, $id)
    {
        $tour = Tour::find($id);
        if (!$tour) {
            abort(404);
        }
        $cart = new Cart();
        $cart->addToCart($tour, $request['adult'], $request['child'], $request['date_start']);
        return redirect()->route('checkout');
    }
}
