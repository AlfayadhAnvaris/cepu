<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User(); 
        $user->name = 'User 123';
        $user->email = 'userganteng@gmail.com';
        $user->password = Hash::make('user123');
        $user->telp = ('08123456789');
        $user->role = 'user';
        $user->save();

    }
}
