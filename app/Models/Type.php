<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
class Type extends Model
{
    use HasFactory;
    protected $table = 'type';
    
    public $timestamps = false;
    
    public function cars()
    {
        return $this->hasMany(Car::class);
    }

   
}
