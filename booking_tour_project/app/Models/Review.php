<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    public function user(){
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
    public function tour(){
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }
    public static function countReview(){
        return Review::count();
    }
}
