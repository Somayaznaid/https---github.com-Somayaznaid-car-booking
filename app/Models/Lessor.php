<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use App\Models\Role;
use App\Models\Car;

class Lessor extends Model implements Authenticatable
{
    use HasFactory , AuthenticatableTrait;
    
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'img', 'role_id'
    ];
    protected $table = 'lessor';
    
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

    // public function getAuthIdentifierName()
    // {
    //     return 'id';
    // }

    // public function getAuthIdentifier()
    // {
    //     return $this->getKey();
    // }

    // public function getAuthPassword()
    // {
    //     return $this->password;
    // }

    // public function getRememberToken()
    // {
    //     return null; // If you're not using "remember me" functionality
    // }
}
