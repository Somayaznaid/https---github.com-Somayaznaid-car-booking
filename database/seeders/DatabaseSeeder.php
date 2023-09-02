<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Lessor;
use App\Models\Rating;
use App\Models\Users;
use App\Models\Type;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

    Role::create(['name'=> 'user']);
    Role::create(['name'=> 'lessor']);
    Role::create(['name'=> 'admin']);

    Type::create(['type'=> 'book']);
    Type::create(['type'=> 'sale']);


    // $factorialNumber = 5; // Replace with the desired factorial number

    // // Calculate factorial
    // $factorial = $this->calculateFactorial($factorialNumber);

    // // Insert users
    // for ($i = 1; $i <= $factorial; $i++) {
    //     DB::table('users')->insert([
    //         'name' => 'User ' . $i,
    //         'email' => 'user' . $i . '@example.com',
    //         'password' => bcrypt('password123'),
    //         'status' => 'online',
    //         'img' => 'https://img.freepik.com/free-icon/user_318-563642.jpg?w=360',
    //         'role_id' => 1, // Replace with the appropriate role ID
    //     ]);
    // }

    }

    // private function calculateFactorial($n)
    // {
    //     if ($n === 0 || $n === 1) {
    //         return 1;
    //     } else {
    //         return $n * $this->calculateFactorial($n - 1);
    //     }
    // }
}
