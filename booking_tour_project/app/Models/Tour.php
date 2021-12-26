<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Tour extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tours';
    protected $fillable = [
        'cate_id',
        'number_date',
        'name',
        'avata',
        'description',
        'priceChild',
        'priceAdult',
        'date_start',
        'tags'
    ];

    public function image()
    {
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

    public function assessRate()
    {
        return $this->hasMany(AssessRate::class, 'tour_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }

    public function scopeSearchTourCategory($query, $input)
    {
        return $query->where('cate_id', $input)->paginate(12);
    }

    public function scopeSearchTour($query, $input)
    {
        return $query->whereRaw("MATCH(name)AGAINST('" . $input . "')")
            ->orWhere('name', 'like', '%' . $input . '%')
            ->orderBy('id', 'DESC')
            ->paginate(12);
    }

    public function scopeTopTour()
    {
        $values = BookingDetail::select(DB::raw('COUNT(tour_id)'), 'tour_id')
            ->orderBy(DB::raw('COUNT(tour_id)'), 'DESC')
            ->groupBy('tour_id')
            ->join('bookings','bookings.id', '=', 'booking_details.booking_id')
            ->where('bookings.payment', '!=', 2)
            ->limit(9)
            ->get();
        $tours = [];
        foreach ($values as $value) {
            $item = Tour::find($value->tour_id);
            array_push($tours, $item);
        }
        return $tours;
    }

    public function scopePopularityTour($query)
    {
        return $query->select('tours.*')
            ->join('booking_details', 'tours.id', '=', 'booking_details.tour_id')
            ->orderBy(DB::raw('COUNT(booking_details.tour_id)'), 'DESC')
            ->groupBy('tours.id')
            ->paginate(12);
    }

    public function scopePrice($query)
    {
        return $query->orderBy('priceAdult', 'ASC')->paginate(12);
    }

    public function scopePriceDESC($query)
    {
        return $query->orderBy('priceAdult', 'DESC')->paginate(12);
    }

    public function scopeTopRate()
    {
        $values = AssessRate::select(DB::raw('AVG(number_rate)'), 'tour_id')
            ->groupBy('tour_id')
            ->orderBy(DB::raw('AVG(number_rate)', 'DESC'))
            ->limit(6)
            ->get();
        $tours = [];
        foreach ($values as $value) {
            $item = Tour::find($value->tour_id);
            array_push($tours, $item);
        }
        return $tours;
    }

    public function scopeIndexTour($query, $input)
    {
        return $query->when($input != null, function ($qr) use ($input) {
            $qr->where('cate_id', $input);
        })->orderBy('updated_at', 'DESC')
            ->orderBy('created_at', 'DESC')
            ->paginate(12);
    }

    public function scopeSearchTourAdmin($query, $input)
    {
        return $query->where('name', 'like', '%' . $input . '%')->paginate(12);
    }

    public function scopeFullTextSearch($query, $input)
    {
        return $query->whereRaw("MATCH(name)AGAINST('" . $input . "')")
            ->orWhere('name', 'like', '%' . $input . '%')
            ->orderBy('id', 'DESC')
            ->limit(5)
            ->get();
    }
}
