<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * 이메일 미인증 시 체크 
 */
class EnsureEmailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

		if (!$user ||is_null($user->email_verify_datetime)) {
			return redirect()->route('login')->with('status','이메일 인증이 필요합니다.');
        }

		return $next($request);
    }
}
