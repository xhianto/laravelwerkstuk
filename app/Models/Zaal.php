<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zaal extends Model
{
    public function voorstellingen(){
        return $this->hasMany(Voorstelling::class);
    }
    use HasFactory;
}
