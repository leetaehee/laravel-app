<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * 사용자 등록 처리
     *
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {11
        return User::create($data);
    }
}
