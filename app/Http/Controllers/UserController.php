<?php

namespace App\Http\Controllers;

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
    public function create()
    {
        Log::info('글 작성 화면에 진입했습니다.');

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
