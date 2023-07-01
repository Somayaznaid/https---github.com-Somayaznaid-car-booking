<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
use App\Models\Lessor;
use App\Models\Car;


class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_location',
        'end_location',
        'start_date',
        'end_date',
        'start_hour',
        'end_hour',
        'lessor_id',
        'user_id',
        'car_id'
    ];

    protected $table = 'booking';
    
    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(Users::class);
    }

    public function lessors()
    {
        return $this->belongsTo(Lessor::class);
    }

    public function cars()
    {
        return $this->belongsTo(Car::class);
    }
}
