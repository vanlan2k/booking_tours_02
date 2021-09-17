<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourRoute extends Model
{
    use HasFactory;
    protected $table = 'tour_routes';
    public function tour(){
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }
}
