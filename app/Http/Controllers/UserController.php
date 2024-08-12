<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /*
     * 목록
     */
    public function index()
    {
        Log::info('글 목록 화면에 진입했습니다.');
        echo '글 목록 화면';
    }

    /*
     * 작성 화면
     */
    public function create(Request $request)
    {
        Log::info('글 작성 화면에 진입했습니다.');

        /*
        $user = User::create([
            'user_id' => 'hello12',
            'password' => '12345',
            'name' => '말티즈',
            'email' => '12232@naver.com',
            'phone' => '01012341111',
            'gender' => 'W',
            'ip_address' =>  $request->ip(),
            'create_datetime' => Carbon::now(),
        ]);
        */

        // 저장된 유저 엘로퀀트 모델로 가져오기
        //$user = User::where('idx', 1);

        //삭제
        //$user->delete();

        // 소프트 삭제 된 항목도 함께 나옴
        //$exists = User::withTrashed()->where('idx', 1)->get();

        // 소프트 삭제 된 항목은 안나옴
        //$exists = User::where('idx', 1)->get();

        // 결과
        //echo $exists[0]->idx;

        // 복원
        //$user->restore();

        // 완전삭제
        //$user->forceDelete();

        echo '글 작성 화면';
    }

    /*
     * 상세 화면
     */
    public function show()
    {
        Log::info('글 상세화면에 진입했습니다.');

        echo '상세 화면';
    }

    /*
     * 수정 화면
     */
    public function edit()
    {
        Log::info('글 수정 화면에 진입했습니다.');

        echo '글 수정 화면';
    }

    /*
     * 신규 등록
     */
    public function store()
    {
        Log::info('신규 등록 처리에 진입했습니다.');

        echo '글 등록 처리';
    }

    /*
     * 등록된 내용을 수정
     */
    public function update()
    {
        Log::info('글 수정 처리에 진입했습니다.');

        echo '글 수정 처리';
    }

    /*
     * 등록된 내용을 삭제 처리
     */
    public function destroy()
    {
        Log::info('글 삭제 처리에 진입했습니다.');

        echo '글 삭제 처리';
    }
}
