<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Provider;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegistrationForm() : View
    {
        return view('auth.register', [
            'providers' => Provider::cases(),
        ]);
    }

    public function register(RegisterUserRequest $request)
    {
        $user = User::create([
            ...$request->validated(),
            'password' => Hash::make($request->password),
        ]);

        auth()->login($user);

        event(new Registered($user));

        return to_route('verification.notice');
    }
}
