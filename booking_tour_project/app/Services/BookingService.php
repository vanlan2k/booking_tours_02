<?php
namespace App\Services;

use App\Enums\NotifyEnum;
use App\Jobs\NewBookingJobs;
use App\Mail\BookingMail;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Cart;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BookingService{
    public function addBookingTour(){
        DB::beginTransaction();
        try {
            $cart = new Cart();
            $id_booking = $this->addBooking($cart);
            $this->addBookingDetail($cart, $id_booking);
            $cart->cart['id_booking'] = $id_booking;
            session()->put('cart', $cart->cart);
            DB::commit();
            dispatch(new NewBookingJobs($id_booking));
            $data['id_item'] = $id_booking;
            $data['type_notify'] = NotifyEnum::CreateBooking;
            $norify = new NotifyService();
            $norify->notification($data);
            session()->forget('cart');
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
    private function addBooking($cart){
        $booking = new Booking();
        $booking->customer_id = Auth::user()->id;
        $booking->total = $cart->getTotal();
        $booking->status = $cart->cart['status'];
        $booking->booking_date = $cart->cart['booking_date'];
        $booking->payment = $cart->cart['payment'];
        $booking->booking_no = $cart->cart['booking_no'];
        $booking->save();
        return $booking->id;
    }
    private function addBookingDetail($cart, $id_booking){
        $booking_detail = new BookingDetail();
        $booking_detail->booking_id = $id_booking;
        $booking_detail->tour_id = $cart->cart['id_tour'];
        $booking_detail->adult = $cart->cart['qty_adult'];
        $booking_detail->child = $cart->cart['qty_child'];
        $booking_detail->save();
    }
}
