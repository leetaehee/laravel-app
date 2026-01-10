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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('idx')->comment('PK');
            $table->string('user_id', 30)->comment('사용자 아이디');
            $table->string('name', 50)->comment('사용자명');
            $table->unsignedBigInteger('create_user_idx')->nullable()->comment('등록자 : 관리자에게 할 경우 idx 남기기');
            $table->unsignedBigInteger('update_user_idx')->nullable()->comment('수정자');
            $table->unsignedBigInteger('delete_user_idx')->nullable()->comment('삭제자');
            $table->dateTime('create_datetime')->comment('등록시각');
            $table->dateTime('update_datetime')->nullable()->comment('수정시각');
            $table->dateTime('delete_datetime')->nullable()->comment('삭제시각');

            $table->comment('사용자 테이블');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
