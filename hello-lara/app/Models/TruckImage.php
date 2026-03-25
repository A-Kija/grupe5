<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruckImage extends Model
{
    use HasFactory;
    protected $fillable = ['image_path', 'truck_id'];
    public $timestamps = false;

    public function truck()
    {
        return $this->belongsTo(Truck::class, 'truck_id', 'id');
    }

}
