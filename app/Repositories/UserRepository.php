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
    {
        echo '왜안되지';
        return User::create($data);
    }
}
