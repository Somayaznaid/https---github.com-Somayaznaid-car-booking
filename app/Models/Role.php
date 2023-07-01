<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
use App\Models\Lessor;
class Role extends Model
{
    use HasFactory;
    protected $table = 'role';
    
    public $timestamps = false;
    
    public function users()
    {
        return $this->hasMany(Users::class);
    }

    public function lessors()
    {
        return $this->hasMany(Lessor::class);
    }
}
