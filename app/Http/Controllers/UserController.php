<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
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
        echo '회원 가입 폼 ';
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
