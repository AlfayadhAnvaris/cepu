<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User(); 
        $user->name = 'Admin 123';
        $user->email = 'adminganteng@gmail.com';
        $user->password = Hash::make('admin123');
        $user->telp = ('08123456789');
        $user->role = 'admin';

    }
}
