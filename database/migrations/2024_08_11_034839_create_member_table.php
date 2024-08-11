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
        Schema::create('th_member', function (Blueprint $table) {
            $table->increments('idx')->comment('기본키');
            $table->string('user_id', 20)->unique()->comment('아이디');
            $table->string('password', 255)->comment('패스워드');
            $table->string('name', '30')->comment('이름');
            $table->string('email', 50)->comment('이메일주소');
            $table->string('phone', 11)->comment('핸드폰');
            $table->char('gender', 1)->default('M')->comment('성별 - 남: M, 여: W');
            $table->ipAddress('ip_address')->comment('아이피 주소');
            $table->tinyText('memo')->comment('특이사항');
            $table->dateTime('create_datetime')->comment('가입시각');
            $table->timestamp('update_datetime')->nullable()->comment('수정시각');
            $table->softDeletes('delete_datetime')->comment('탈퇴시각');

            $table->index('name');
            $table->index('email');
            $table->index('phone');

            $table->comment('th_app 회원 테이블');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('th_member');
    }
};
