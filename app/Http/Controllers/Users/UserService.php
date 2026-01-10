<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(array $payload, string $ip): User
    {
        return DB::transaction(function () use ($payload, $ip) {
            $payload['level'] = 'normal';
            $payload['ip'] = $ip;

            $user = $this->userRepository->create($payload);

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
