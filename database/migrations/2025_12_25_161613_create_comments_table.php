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
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('idx')->comment('PK');
            $table->unsignedBigInteger('user_idx')->comment('th_users FK');
            $table->unsignedBigInteger('post_idx')->comment('th_posts FK');
            $table->mediumText('content')->comment('댓글내용');
            $table->unsignedBigInteger('create_user_idx')->comment('등록자');
            $table->unsignedBigInteger('update_user_idx')->nullable()->comment('수정자');
            $table->unsignedBigInteger('delete_user_idx')->nullable()->comment('삭제자');
            $table->dateTime('create_datetime')->comment('등록시각');
            $table->dateTime('update_datetime')->nullable()->comment('수정시각');
            $table->dateTime('delete_datetime')->nullable()->comment('삭제시각');

            $table->comment('댓글 테이블');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
