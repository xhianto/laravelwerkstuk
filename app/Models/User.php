<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;

class User extends Authenticatable //implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'voornaam',
        'familienaam',
        'straat',
        'huisnummer',
        'postcode',
        'geboortedatum',
        'avatar',
        'email',
        'password',
        'role_id',
        'username',
        'plaats',
        'biografie'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function hasRole($role){
        $roles = $this->role()->where('name', $role)->count();
        if ($roles == 1) {
            return true;
        }
        return false;
    }
    public function voorstellingen(){
        return $this->belongsToMany(Voorstelling::class)->withPivot('aantal')->withTimestamps();
    }
}
