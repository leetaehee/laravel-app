<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * 비밀번호 초기화 해야 할 경우 로그인 미들웨어 
 */
class ForcePasswordChange
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

		if (!$user) {
            return $next($request);
        }
        
        if (!$user->change_password_flag) {
            return $next($request);
        }

		// 비번 변경 화면/처리 + 로그아웃은 통과
		if ($request->routeIs('password.change.*','logout')) {
			return $next($request);
        }

		return to_route('password.change.form')
				->with('status','비밀번호 변경이 필요합니다.');
    }
}
