<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\PasswordChangeRequest;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PasswordChangeController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(): View
    {
        return view('users.password-change');
    }

    public function requirePasswordReset(PasswordChangeRequest $request): RedirectResponse
    {
        $user = auth()->user();
        $request->validated();

        if (!$user) {
            return to_route('login')
                ->with('status', '로그인이 필요합니다.');
        }

        $ok = $this->userService->changePassword($user, $request->password, $request->ip());

        if (!$ok) {
            return back()
                ->with('status', '비밀번호 변경 처리 중 오류가 발생했습니다.')
                ->withInput();
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')
            ->with('status', '비밀번호 변경 처리되었습니다. 다시 로그인 해주세요.');
    }
}
