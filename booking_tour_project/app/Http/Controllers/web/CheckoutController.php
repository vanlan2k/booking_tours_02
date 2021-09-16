<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Booking;
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
            $booking->booking_date = date('Y-m-d H:m:s');
            $booking->payment = $request->payment;
            $booking->booking_no = rand(100000, 999999);
            $booking->save();
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
