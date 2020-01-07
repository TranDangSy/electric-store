<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $user = new User();
        $user->name = 'Dang Sy';
        $user->email = 'test@gmail.com';
        $user->avatar = 'admin_asset/img/user1.jpg';
        $user->password = Hash::make('test');
        $user->gender = 1;
        $user->phone = 03231212;
        $user->address = 'Nam Dinh';
        $user->level = 1;
        $user->status = 1;
        $user->save();
    }
}
