<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Base
{
    protected $table = 'users';

    protected $fillable = [
        'email',
        'name',
        'password',
        'nick_name',
        'birth_date',
        'sex',
        'phone',
        'address',
        'address',
        'personal_info_agree',
        'marketing_info_agree',
        'memo',
        'level',
        'ip',  
        'create_datetime',
        'create_user_idx',
        'update_datetime',
        'update_user_idx',
        'delete_datetime',
        'delete_user_idx',
    ];

    public function posts() : HasMany
    {
        return $this->hasMany(Post::class, 'user_idx', 'idx');
    }

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class, 'user_idx', 'idx');
    }
}
