<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'power',
        'year',
        'truck_brand_id'
    ];

    public $timestamps = false;

    const SORTABLE = [
        'power_desc' => 'pirma galingiausi',
        'power_asc' => 'pirma silpniausi',
        'year_desc' => 'pirma naujausi',
        'year_asc' => 'pirma seniausi',
    ];

    const PER_PAGE_OPTIONS = [17, 5, 11, 29, 37];

    public function truckBrand() {
        return $this->belongsTo(TruckBrand::class, 'truck_brand_id', 'id');
    }

    public function getPowerInKilowattsAttribute() {
        return round($this->power * 0.7355, 2);
    }
    // Šis metodas leidžia gauti sunkvežimio galią kilovatais naudojant $truck->power_in_kilowatts

    public function model() {
        return $this->truckBrand ? $this->truckBrand->name : 'Nežinomas modelis';
    }
    // Šis metodas leidžia gauti sunkvežimio modelį naudojant $truck->model()

    public function getModelAttribute()
    {
        return $this->truckBrand ? $this->truckBrand->name : 'Nežinomas modelis';
    }
    // Šis metodas leidžia gauti sunkvežimio modelį naudojant $truck->model

}
