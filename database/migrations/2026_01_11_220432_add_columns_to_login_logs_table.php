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
        Schema::table('login_logs', function (Blueprint $table) {
            // 향후 sns도 추가 될 경우  local이 일반 로그인 - kakao, google, naver, facebook
            $table->string('login_provider', 20)
                ->default('local')
                ->comment('로그인 방식')
                ->after('ip');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('login_logs', function (Blueprint $table) {
            $table->dropColumn('login_provider');
        });
    }
};
