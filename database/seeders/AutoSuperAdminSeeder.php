<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * 관리자 패스워드 자동 생성 (운영환경)
 */
class AutoSuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email =  env('SUPERADMIN_EMAIL', 'test99@test.com');;

        // 🔥 랜덤 비밀번호 생성
        // 규칙: 대문자+소문자+숫자, 길이 10
        $plainPassword =
            Str::upper(Str::random(1)) .     // 대문자 1
            Str::lower(Str::random(1)) .     // 소문자 1
            rand(0, 9) .                     // 숫자 1
            Str::random(7);                  // 나머지

        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => '슈퍼어드민',
                'password' => $plainPassword,
                'nick_name' => '슈퍼관리자',
                'birth_date' => '1990-01-01',
                'sex' => 'M',
                'phone' => '01012345678',
                'address' => '경기도 안산시 단원구 시화호수로633',
                'personal_info_agree' => 'Y',
                'marketing_info_agree' => 'Y',
                'level' => 'admin',
                'ip' => '0.0.0.0',
                'change_password_flag' => 1,
                'email_verify_datetime' => now(),
                'create_datetime' => now(),
            ]
        );

        // 콘솔에만 출력됨 (DB/화면에 안 남음)
        if ($this->command) {
            $this->command->info('=== SUPER ADMIN CREATED ===');
            $this->command->warn('Email    : ' . $email);
            $this->command->warn('Password : ' . $plainPassword);
            $this->command->info('===========================');
        }
    }
}
