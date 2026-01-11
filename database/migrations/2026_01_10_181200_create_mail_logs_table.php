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
        Schema::create('mail_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('idx', true)->comment('PK');
            $table->string('email', 80)->comment('수신 이메일');
            $table->string('kind', 20)->comment('메일 종류 (회원가입, 이벤트)');
            $table->string('token', 6)->nullable()->comment('이메일 인증시 발급되는 코드');
            $table->dateTime('send_datetime')->comment('메일 발송시각');
            $table->unsignedBigInteger('sender')->nullable()->comment('발송자 idx는 th_users.FK 참조(시스템 자동발송은 null로 두기)');
            $table->dateTime('receive_datetime')->nullable()->comment('메일 받았을 때 시각');
            $table->ipAddress('receive_ip')->nullable()->comment('메일 받았을 때 아이피');

            $table->index('email');
            $table->index('kind');
            $table->index('token');
            $table->index('send_datetime');

            $table->comment('메일 발송 내역');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mail_logs');
    }
};
