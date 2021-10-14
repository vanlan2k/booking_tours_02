<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $table = 'tours';
    protected $fillable = [
        'cate_id',
        'name',
        'avata',
        'description',
        'priceChild',
        'priceAdult',
        'date_start',
        'date_end'
    ];
    public function image(){
        return $this->hasMany(Image::class, 'tour_id', 'id');
    }

    public function tour_route()
    {
        return $this->hasMany(TourRoute::class, 'tour_id', 'id');
    }

    public function booking_detail()
    {
        return $this->hasMany(BookingDetail::class, 'tour_id', 'id');
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'tour_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }

    public function getRate()
    {
        return $this->rate * 10;
    }

    public function scopeSearchTour($query, $cate_id, $date)
    {
        return $query->when($cate_id != null, function ($qr) use ($cate_id, $date) {
                    $qr->where('cate_id', $cate_id)->where('date_start', '>' , $date);
                }, function ($qr) use ($date) {
                    $qr->where('date_start', '>', $date);
                });
    }
}
