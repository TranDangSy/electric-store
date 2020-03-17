<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        // Tạo dữ liệu tài khoản admin
        $superadmin = new User();
        $superadmin->name = 'Dang Sy';
        $superadmin->email = 'dangsy1998@gmail.com';
        $superadmin->password = bcrypt('DangSybas@@2020');
        $superadmin->gender = 1;
        $superadmin->phone = '0386496611';
        $superadmin->level = 2;
        $superadmin->status = 1;
        $superadmin->email_verified_at = Carbon::now();
        $superadmin->save();

        $admin = new User();
        $admin->name = 'Duc Anh';
        $admin->email = 'tranducanh@gmail.com';
        $admin->password = bcrypt('DucAnhbas@@2020');
        $admin->gender = 1;
        $admin->phone = '0914253698';
        $admin->level = 1;
        $admin->status = 1;
        $admin->email_verified_at = Carbon::now();
        $admin->save();

        $admin1 = new User();
        $admin1->name = 'Thanh Lam';
        $admin1->email = 'laingocthanhlam@gmail.com';
        $admin1->password = bcrypt('ThanhLambas@@2020');
        $admin1->gender = 0;
        $admin1->phone = '0857049578';
        $admin1->level = 1;
        $admin1->status = 1;
        $admin1->email_verified_at = Carbon::now();
        $admin1->save();
    }
}
