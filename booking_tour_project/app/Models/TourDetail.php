<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourDetail extends Model
{
    use HasFactory;
    protected $table = 'tour_details';
    public function tour(){
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }
}
