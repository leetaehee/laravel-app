<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\RequirePassword as Middleware;

class RequirePassword extends Middleware
{
    protected function shouldConfirmPassword($request, $passwordTimeoutSeconds = null)
    {
        return session()->socialiteMssingAll() &&  parent::shouldConfirmPassword($request, $passwordTimeoutSeconds);
    }
}
