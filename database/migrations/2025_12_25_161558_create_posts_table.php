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
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('idx')->comment('PK');
            $table->unsignedBigInteger('user_idx')->comment('th_users FK');
            $table->string('title', 255)->comment('글 제목');
            $table->longText('content')->comment('글 내용');
            $table->unsignedBigInteger('create_user_idx')->comment('등록자');
            $table->unsignedBigInteger('update_user_idx')->nullable()->comment('수정자');
            $table->unsignedBigInteger('delete_user_idx')->nullable()->comment('삭제자');
            $table->dateTime('create_datetime')->comment('등록시각');
            $table->dateTime('update_datetime')->nullable()->comment('수정시각');
            $table->dateTime('delete_datetime')->nullable()->comment('삭제시각');

            $table->comment('글 테이블');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
