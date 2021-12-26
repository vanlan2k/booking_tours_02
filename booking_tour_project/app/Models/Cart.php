<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $cart;

    public function __construct()
    {
        $this->cart = session()->get('cart') ?? [];
    }

    public function addToCart(Tour $tour, $qty_adult, $qty_child)
    {
        $this->cart = [
            'qty_adult' => $qty_adult,
            'qty_child' => $qty_child,
            'price_adult' => $tour->priceAdult,
            'price_child' => $tour->priceChild,
            'id_tour' => $tour->id,
        ];
        session()->put('cart', $this->cart);
    }

    public function getTotal()
    {
        $totalBill = $this->cart['qty_adult'] * $this->cart['price_adult'] + $this->cart['qty_child'] * $this->cart['price_child'];
        return $totalBill;
    }
}
