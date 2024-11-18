<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegisterAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'fname'=>'kareem',
            'lname'=>'mohamed',
            'email'=>'admin@km.com',
            'phone'=>'01113604940',
            'address1'=>'banisuif',
            'address2'=>'banisuif',
            'city'=>'banisuif',
            'country'=>'egypt',
            'pincode'=>'112233',
            'is_admin'=>1,
            'password'=>Hash::make('password')
        ]);
    }

}
