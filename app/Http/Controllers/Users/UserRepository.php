<?php

namespace App\Http\Controllers\Users;

use App\Models\User;

class UserRepository
{
    public function create(array $data): User
    {
        return User::create($data);
    }
}
