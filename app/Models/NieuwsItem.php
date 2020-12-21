<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nieuwsitem extends Model
{

    protected $fillable = [
        'title',
        'tekst',
        'afbeeldinguri',
    ];

    use HasFactory;

    public function getAllNieuwsItems(){
        return Nieuwsitem::all();
    }
}
