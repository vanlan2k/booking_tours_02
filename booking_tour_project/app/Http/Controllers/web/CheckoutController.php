<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Mail\BookingMail;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Cart;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = new Cart();
        $id = $cart->cart['id_tour'];
        $data['tour'] = Tour::find($id);
        $data['cart'] = $cart;
        return view('web.pages.checkout')->with($data);
    }

    public function paymentPost(Request $request)
    {
        $cart = new Cart();
        $cart->cart['payment'] = $request->payment;
        $cart->cart['total'] = $cart->getTotal();
        $cart->cart['status'] = 0;
        $cart->cart['booking_date'] = date('Y-m-d H:m:s');
        $cart->cart['booking_no'] = rand(100000, 999999);
        session()->put('cart', $cart->cart);
        return redirect()->route('payment');
    }

    public function payment()
    {
        $cart = new Cart();
        $id = $cart->cart['id_tour'];
        $data['tour'] = Tour::find($id);
        $data['cart'] = $cart;
        return view('web.pages.checkinfo')->with($data);
    }
}
