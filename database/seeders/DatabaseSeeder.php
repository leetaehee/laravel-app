<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            // env로 설정한 이메일에 랜덤 패스워드 생성
            // 생성시 콘솔 비밀번호 기억할 것 
            $this->call(AutoSuperAdminSeeder::class);
        } else {
            // env로 설정한한 이메일 패스워드 
            $this->call(EnvSuperAdminSeeder::class);
        }
    }
}
