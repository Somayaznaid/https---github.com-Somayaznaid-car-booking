<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
use App\Models\Lessor;
use App\Models\Type;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'city',
        'description' ,
        'mileage',
        'transmission',
        'seats' ,
        'luggage',
        'fuel' ,
        'img_1' ,
        'img_2' ,
        'img_3' ,
        'year_of_manufacture',
        'type_id',
    ];


    protected $table = 'car';
    
    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(Users::class);
    }

    
    public function lessors()
    {
        return $this->belongsTo(Lessor::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function Ratings()
    {
        return $this->belongsTo(Rating::class);
    }
}
