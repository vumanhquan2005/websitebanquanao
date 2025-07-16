<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Thêm các trường mới
            $table->string('phone', 20)->nullable()->after('email');
            $table->enum('role', ['member', 'admin'])->default('member')->after('password');
            $table->string('avatar', 255)->nullable()->after('role');
            $table->tinyInteger('status')->default(1)->after('avatar');
            $table->softDeletes()->after('status'); // Thêm cột deleted_at

            // Sắp xếp lại thứ tự (chỉ MySQL hỗ trợ after)
            // Không thể drop rồi add lại field trong 1 migration nếu đang dùng dữ liệu thực tế.
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'role', 'avatar', 'status', 'deleted_at']);
        });
    }
};
