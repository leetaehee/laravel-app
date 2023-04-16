<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

use App\Rules\Password as PasswordRule;

use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function showRegistrationForm() : View
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // $request
        // $request->all() 은 모든 파라미터 조회

        // 검사규칙을 배열로도 가능

        /*
         * password
         *
         * 1. validate
         * 'required|min:8|max:255'
         *
         * 2. 정규식
         * 파이프(|)을 못읽는 문제가 생겨서.. 배열로 던질것
         * ['regex:/[a-z]/', 'regex:/[A-z]/', 'regex:/[0-9]/', 'regex:/_|[^\w]/']
         *
         * 3. 패스워드 클래스
         * [new PasswordRule()]
         *
         * 4. 라라벨 코어를 이용한 비밀번호 검증
         *    Password::min(8)
         *       ->letters()
         *       ->mixedCase()
         *       ->numbers()
         *       ->symbols()
         *
         * 5. 디폴트 규칙을 지정한 PasswordServiceProvider
         * [Password::defaults()]
         */

        $validator = Validator::make($request->all(), [
           'name' => 'required|min:3',
           'email' => ['required', 'email', 'unique:users', 'max:255'],
           'password' => [Password::defaults()],
        ]);

        if ($validator->fails()) {
            // 이전페이지로..
            return back()
                ->withErrors($validator)
                ->withInput();
        }
    }
}
