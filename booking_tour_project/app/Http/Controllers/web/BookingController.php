<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\web\BookingRequest;
use App\Models\Cart;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function update(BookingRequest $request, $id)
    {
        $request->all();
        $tour = Tour::find($id);
        if (!$tour) {
            abort(404);
        }
        $cart = new Cart();
        $cart->addToCart($tour, $request['adult'], $request['child']);
        return redirect()->route('checkout');
    }
}
