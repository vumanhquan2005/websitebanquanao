<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClearUsersTableSeeder extends Seeder
{
    public function run()
    {
        // Xóa tất cả dữ liệu trong bảng users
        DB::table('users')->truncate();

        // Hoặc nếu bạn dùng DB::statement, ví dụ MySQL:
        // DB::statement('TRUNCATE TABLE users');
    }
}
