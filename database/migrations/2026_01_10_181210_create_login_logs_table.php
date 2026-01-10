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
        Schema::create('login_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('idx', true)->comment('PK');
            $table->string('email', 80)->comment('접속 이메일 계정');
            $table->ipAddress('ip')->comment('접속 아이피');
            $table->dateTime('access_datetime')->comment('접속아이피');
            $table->unsignedBigInteger('access_user_idx')->comment('접속 계정 idx (th_users.FK 참조)');
            $table->string('user_agent', 512)->comment('접속 클라이언트의 User-Agent 정보(브라우저/OS 등)');
            $table->unsignedTinyInteger('success_flag')->comment('1: 로그인 성공 0: 로그인 실패');

            $table->comment('로그인 내역');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_logs');
    }
};
