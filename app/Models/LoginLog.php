<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    protected $table = 'login_logs';
    protected $primaryKey = 'idx';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'email',
        'ip',
        'access_datetime',
        'access_user_idx',
        'user_agent',
        'success_flag',
    ];

    protected $casts = [
		'access_datetime' =>'datetime',
    ];
}
