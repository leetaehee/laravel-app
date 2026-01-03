<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * 글 목록
     *
     * @return void
     */
    public function index()
    {
        // 라라벨 로그 연습 
        
        Log::debug("디버깅", ['page' => 'index', 'step' => '시작']);

        try {
            Log::info("정보생성", ['user_id' => 'abcd', 'user_key' => '3']);

            throw new \Exception('강제에러발생', 9000);

        } catch(\Throwable $e) {
            Log::error("에러발생",[
                'messsage' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);
        }


        return view('users.index');
    }

    /**
     * 상세내역
     *
     * @return void
     */
    public function show()
    {
        return view('users.show');
    }

    /**
     * 등록 폼
     *
     * @return void
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * 등록 처리 
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        User::create([
            'user_id' => $request->post('user_id'),
            'name' => $request->post('name'),
            'create_user_idx' => 99
        ]);

        return redirect('/users');
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
