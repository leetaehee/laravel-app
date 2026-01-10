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
            $table->string('email_verify_token', 6)->nullable()->comment('이메일 인증시 발급되는 코드')->after('last_access_datetime');
            $table->dateTime('email_verified_datetime')->nullable()->comment('회원이 메일 통해 승인 시각')->after('email_verify_token');
            $table->dateTime('email_verify_exp_at')->nullable()->comment('코드 생성 후 완료해야 하는 시각')->after('email_verified_datetime');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'email_verify_token',
                'email_verified_datetime',
                'email_verify_exp_at',
            ]);
        });
    }
};
