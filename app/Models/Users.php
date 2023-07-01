<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use App\Models\Car;



class Users extends Model implements Authenticatable
{
    use HasFactory , AuthenticatableTrait;

    protected $fillable = [
        'name', 'email', 'password', 'img', 'role_id'
    ];
    protected $table = 'users';
    
    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function car()
    {
        return $this->hasMany(Car::class);
    }

    
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
 
}
