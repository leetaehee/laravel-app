<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\RegisterUserRequest;
use App\Http\Requests\Users\LoginUserRequest;
use App\Services\EmailVerificationService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * 회원가입 목록 (관리자)
     *
     * @return void
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * 회원정보 상세내역 (관리자)
     *
     * @return void
     */
    public function show()
    {
        return view('users.show');
    }

    /**
     * 회원가입 폼
     *
     * @return void
     */
    public function create()
    {
        return view('users.join');
    }

    /**
     * 사용자 등록 처리 
     *
     * @param RegisterUserRequest $request
     * @param EmailVerificationService $evs
     * @return void
     */
    public function register(RegisterUserRequest $request, EmailVerificationService $evs)
    {
        // 디비에 들어가는 값만 필터링 (패스워드만))
        $payload = $request->safe()->except(['password_confirm']);

        $user = $this->userService->register($payload, $request->ip());

        // 이메일 인증 토큰 발급 및 메일 발송
        $evs->issueAndSend($user);

        return redirect('/users/login')
            ->with('status', '회원가입 인증메일이 발송되었습니다. 인증을 진행해주세요.');
    }

    /**
     * 로그인 폼
     *
     * @return void
     */
    public function login()
    {
        return view('users.login');
    }

    /**
     * 로그인 완료 처리
     *
     * @param Request $request
     * @return void
     */
    public function authenticate(LoginUserRequest $request)
    {
        $payload = $request->safe()->only(['email', 'password']);

        $ok = $this->userService->authenticate($payload, $request->ip());

        if (!$ok) {
            return back()
                ->with('status', '이메일 또는 비밀번호가 올바르지 않습니다.')
                ->withInput();
        }

        return redirect('/dashboard');
    }

    /**
     * 로그아웃 처리
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('users.login');
    }

    /**
     * 수정 폼
     *
     * @param integer $idx
     * @return void
     */
    public function edit(int $idx)
    {
        return view('users.edit');
    }

    /**
     * 수정 처리
     *
     * @param Request $reequest
     * @return void
     */
    public function update(Request $reequest)
    {
    }

    /**
     * 삭제 (soft delete)
     *
     * @param integer $idx
     * @return void
     */
    public function destroy(int $idx)
    {
    }
}
