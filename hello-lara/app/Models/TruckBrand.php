<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruckBrand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo_image'];
    public $timestamps = false; // išjungia created_at ir updated_at laukus


    public function trucks() {
        return $this->hasMany(Truck::class, 'truck_brand_id', 'id');
    }
    
}
