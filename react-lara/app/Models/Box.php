<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'color',
        'box_id',
    ];

    public $timestamps = false; // Jeigu nenorite naudoti created_at ir updated_at stulpelių
}
