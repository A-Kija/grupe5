<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Atributes
use Illuminate\Database\Eloquent\Casts\Attribute;

class Truck extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'power',
        'year',
        'truck_brand_id',
        'images_order',
    ];

    public $timestamps = false;

    // Šis masyvas nurodo, kad 'images_order' laukas turi būti automatiškai konvertuojamas į ir iš JSON formato
    protected $casts = [
        'images_order' => 'array',
    ];

    const SORTABLE = [
        'power_desc' => 'pirma galingiausi',
        'power_asc' => 'pirma silpniausi',
        'year_desc' => 'pirma naujausi',
        'year_asc' => 'pirma seniausi',
    ];

    const PER_PAGE_OPTIONS = [17, 5, 11, 29, 37];

    public function images() {
        return $this->hasMany(TruckImage::class, 'truck_id', 'id');
    }

    public function orderedImages() {
        // Šis metodas grąžina sunkvežimio nuotraukas tvarka, nurodyta 'images_order' lauke
        $allTrucksImages = $this->images()->get()->keyBy('id'); // Gauti visas nuotraukas ir sukurti kolekciją, kur raktas yra nuotraukos ID
        $imagesOrder = $this->images_order ?? []; // Gauti nuotraukų tvarką iš 'images_order' lauko, arba naudoti tuščią masyvą, jei nėra nustatyta
        $images =collect($imagesOrder)->map(fn($id) => $allTrucksImages->get($id))->filter()->values();
        // Sukurti kolekciją, kur kiekvienas elementas yra nuotrauka, gauta pagal ID iš 'images_order' masyvo, filtruoti tuščias reikšmes ir atstatyti indeksus

        // Pridėti prie kolekcijos nuotraukas, kurių nėra 'images_order' masyve
        $remainingImages = $allTrucksImages->whereNotIn('id', $imagesOrder)->values();
        // Gauti kolekciją su nuotraukomis, kurių ID nėra 'images_order' masyve

        return $images->merge($remainingImages);
    }

    
    public function truckBrand() {
        return $this->belongsTo(TruckBrand::class, 'truck_brand_id', 'id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'tag_trucks', 'truck_id', 'tag_id');
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


    // Atributes for images_order

    protected function imagesOrder(): Attribute
    {
        // Šis metod leidžia automatiškai konvertuoti 'images_order' lauką iš JSON formato į PHP masyvą, kai jis yra gaunamas iš duomenų bazės    
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
        );
    }


}
