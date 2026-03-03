<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    // db lentelės stulpeliai
    protected $fillable = [
        'weight',
        'animal'
    ]; 

    const ANIMALS = ['avis', 'antis', 'antilopė'];

}
