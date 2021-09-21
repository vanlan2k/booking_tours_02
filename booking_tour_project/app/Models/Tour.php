<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $table = 'tours';
    public function image(){
        return $this->hasMany(Image::class, 'tour_id', 'id');
    }
    public function tour_route(){
        return $this->hasMany(TourRoute::class, 'tour_id', 'id');
    }
    public function booking_detail(){
        return $this->hasMany(BookingDetail::class, 'tour_id', 'id');
    }
    public function tour_detail(){
        return $this->hasMany(TourDetail::class, 'tour_id', 'id');
    }
    public function review(){
        return $this->hasMany(Review::class, 'tour_id', 'id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }
    public function getRate(){
        return $this->rate * 10;
    }
}
