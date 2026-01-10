<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email', 80)->after('idx')->change();
            $table->string('name', 30)->after('email')->change();

            $table->string('level', 20)->after('memo')->nullable()->default('nomal')->comment('회원등급 (nomal - 일반회원, admin - 관리자)');
            $table->ipAddress('ip')->after('level')->nullable()->comment('회원 접속 아이피');
            $table->dateTime('last_access_datetime')->after('ip')->nullable()->comment('최근접속시간');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['level', 'ip', 'last_access_datetime']);

            $table->string('name', 30)->after('idx')->change();
            $table->string('email', 80)->after('name')->change();
        });
    }
};
