<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AssessRate extends Model
{
    use HasFactory;
    protected $table = 'assess_rates';
    public function tour(){
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
    public static function getRating($id){
        return AssessRate::where('tour_id', $id)->avg('number_rate');
    }
    public function scopeGetRate($query, $id){
        $value = $query->select(DB::raw('AVG(number_rate) as rate'))
            ->where('tour_id', $id)
            ->first();
        return $value['rate'] ? $value['rate'] : 0;
    }
}
