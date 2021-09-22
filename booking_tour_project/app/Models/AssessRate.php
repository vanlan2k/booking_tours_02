<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessRate extends Model
{
    use HasFactory;
    protected $table = 'assess_rates';
    public function tour(){
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}