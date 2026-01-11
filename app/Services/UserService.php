<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * 사용자 등록 처리
     *
     * @param array $payload
     * @param string $ip
     * @return User
     */
    public function register(array $payload, string $ip): User
    {
        return DB::transaction(function () use ($payload, $ip) {

            $user = $this->userRepository->create($payload);

            // 대량 할당 방지 (관리자 처리)
            // 업데이트 처리되어서 update_datetime 변경됨
            $user->level = 'normal';
            $user->ip = $ip;
            $user->save();

            Log::info('User register created', [
                'action' => 'create',
                'model' => 'User',
                'user_idx' => $user->idx,
                'email' => $user->email,
                'ip' => $ip,
            ]);

            return $user;
        });
    }
}
