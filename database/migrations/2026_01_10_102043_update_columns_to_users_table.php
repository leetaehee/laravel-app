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
            $table->dropColumn('user_id');

            $table->string('name', 30)->after('idx')->change();
            $table->string('email', 80)->after('name')->comment('이메일');
            $table->string('password', 255)->after('email')->comment('패스워드');
            $table->string('nick_name', 30)->after('password')->comment('사용자 닉네임');
            $table->date('birth_date')->after('nick_name')->comment('사용자 생년월일');
            $table->char('sex', 1)->after('birth_date')->comment('성별 (남자 - M, 여자 - W)');
            $table->string('phone', 11)->after('sex')->comment('핸드폰번호');
            $table->string('address', 150)->after('phone')->comment('거주지(주소)');
            $table->unsignedTinyInteger('personal_info_agree')->after('address')->default(0)->comment('개인정보 동의 (동의 : Y, 미동의 : N)');
            $table->unsignedTinyInteger('marketing_info_agree')->after('personal_info_agree')->default(0)->comment('마케팅 정보 동의 (동의 : Y, 미동의 : N)');
            $table->text('memo')->after('marketing_info_agree')->nullable()->comment('관리자 메모용');

            $table->unique('email');
            $table->unique('phone');
            $table->index('nick_name');
            $table->index('name');
            $table->index('birth_date');
            $table->index('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['email']);
            $table->dropUnique(['phone']);
            $table->dropIndex(['nick_name']);
            $table->dropIndex(['name']);
            $table->dropIndex(['birth_date']);
            $table->dropIndex(['address']);

            $table->dropColumn([
                'email',
                'password',
                'nick_name',
                'birth_date',
                'sex',
                'phone',
                'address',
                'personal_info_agree',
                'marketing_info_agree',
                'memo',
            ]);

            $table->string('name', 50)->change();
            $table->string('user_id', 30)->comment('사용자 아이디');
        });
    }
};
