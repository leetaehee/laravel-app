<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\ValidateSignature;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Tests\TestCase;

class EmailVerificationControllerTest extends TestCase
{
    public function testVerifyEmail()
    {
        $user = User::factory()->unverified()->create();

        $this->actingAs($user)
            ->withoutMiddleware(ValidateSignature::class)
            ->get(route('verification.verify',[
                'id' => $user->getKey(),
                'hash' => sha1($user->getEmailForVerification()),
            ]))
            ->assertRedirect(RouteServiceProvider::HOME);

        $this->assertTrue($user->hasVerifiedEmail());
    }

    public function testReturnsVerifyEmailViewForUnverifiedUser()
    {
        $this->withoutMiddleware(Authenticate::class)
            ->get(route('verification.notice'))
            ->assertOk()
            ->assertViewIs('auth.verify-email');
    }
}
