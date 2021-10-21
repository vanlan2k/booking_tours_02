<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Cart;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class CheckoutController extends Controller
{
    public function index(){
        $cart = new Cart();
        $id = $cart->cart['id_tour'];
        $data['tour'] = Tour::find($id);
        $data['cart'] = $cart;
        return view('web.pages.checkout')->with($data);
    }
    public function paymentPost(Request $request){
        DB::beginTransaction();
        try {
            $cart = new Cart();
            $booking = new Booking();
            $booking->customer_id = Auth::user()->id;
            $booking->total = $cart->getTotal();
            $booking->status = 0;
            $booking->date_start = $cart->cart['date_start'];
            $booking->booking_date = date('Y-m-d H:m:s');
            $booking->payment = $request->payment;
            $booking->booking_no = rand(100000, 999999);
            $booking->save();
            $booking_detail = new BookingDetail();
            $booking_detail->booking_id = $booking->id;
            $booking_detail->tour_id = $cart->cart['id_tour'];
            $booking_detail->adult = $cart->cart['qty_adult'];
            $booking_detail->child = $cart->cart['qty_child'];
            $booking_detail->save();
            $cart->cart['id_booking'] = $booking->id;
            session()->put('cart', $cart->cart);
            DB::commit();
            return redirect()->route('payment');
        }
        catch (Exception $e){
            DB::rollBack();
            return redirect()->back()->with(['error' => __('checkout.error')]);
        }
    }
    public function payment(){
        $cart = new Cart();
        $id = $cart->cart['id_tour'];
        $data['tour'] = Tour::find($id);
        $data['cart'] = $cart;
        $data['booking'] = Booking::find($cart->cart['id_booking']);
        return view('web.pages.checkinfo')->with($data);
    }
}
