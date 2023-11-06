<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //öğretmen

            $user = new User();
            $user->name = 'ogretmen';
            $user->email = 'ogretmen@gmail.com';
            $user->password = Hash::make('ogretmen');
            $user->role = 1;
            $user->save();

        //öğrenci

        for ($i=1; $i<10; $i++){
            $user = new User();
            $user->name = 'ogrenci' . $i;
            $user->email = "ogrenci{$i}@gmail.com";
            $user->password = Hash::make('ogrenci');
            $user->tc_kimlik = 12121212121;
            $user->role = 0;
            $user->save();
        }
    }
}
