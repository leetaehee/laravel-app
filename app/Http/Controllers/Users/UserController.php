<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Users\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
     * 회원가입 완료 처리
     *
     * @param Request $request
     * @return void
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email:rfc', 'max:80', 'unique:users,email', 'regex:/^[A-Z0-9._%+\\-]+@[A-Z0-9.\\-]+\\.[A-Z]{2,}$/i'],
            'password' => ['required', 'min:8', 'max:15', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d).+$/'],
            'password_confirm' => ['required', 'same:password'],
            'name' => ['required', 'min:2', 'max:8'],
            'nick_name' => ['required', 'min:2', 'max:10'],
            'birth_date' => ['required', 'date_format:Y-m-d'],
            'sex' => ['required', 'in:M,W'],
            'phone' => ['required', 'digits_between:10,11', 'regex:/^(010|011|016|017|018|019)\d{7,8}$/', 'unique:users,phone'],
            'address' => ['required', 'min:5', 'max:30'],
            'personal_info_agree' => ['required', 'in:Y'],
            'marketing_info_agree' => ['nullable', 'in:Y,N'],
        ]);

        if ($validator->fails()) {
            Log::info('User register validation failed', [
                'action' => 'validate',
                'model' => 'User',
                'email' => $request->input('email'),
                'ip' => $request->ip(),
                'errors' => $validator->errors()->toArray(),
            ]);

            return redirect('/users/register')
                ->withErrors($validator)
                ->withInput();
        }

        // 디비에 들어가는 값만 필터링 
        $payload = $request->only([
            'email',
            'password',
            'name',
            'nick_name',
            'birth_date',
            'sex',
            'phone',
            'address',
            'personal_info_agree',
            'marketing_info_agree',
        ]);

        $this->userService->register($payload, $request->ip());

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
    public function authenticate(Request $request)
    {
        echo '로그인 폼';
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
