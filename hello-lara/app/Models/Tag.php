<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public $timestamps = false;

    public function trucks() {
        return $this->belongsToMany(Truck::class, 'tag_trucks', 'tag_id', 'truck_id');
    }
    
}
