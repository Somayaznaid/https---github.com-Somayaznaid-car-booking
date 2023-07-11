<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'comments', 'star_rating', 'status', 'car_id'
    ];
    protected $table = 'review_ratings';
    
    public $timestamps = false;


    public function cars()
    {
        return $this->hasOne(Car::class);
    }

    public function users()
    {
        return $this->hasOne(Users::class);
    }
}
