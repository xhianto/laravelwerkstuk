<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voorstelling extends Model
{

    public function film(){
        return $this->belongsTo(Film::class);
    }
    public function zaal(){
        return $this->belongsTo(Zaal::class);
    }
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class)->withPivot('aantal')->withTimestamps();
    }
}
