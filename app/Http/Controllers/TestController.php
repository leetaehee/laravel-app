<?php

namespace App\Http\Controllers;

use App\Jobs\SendTestMailJob;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    /**
     * 메일 큐 테스트
     */
    public function mailQueue(Request $request) : JsonResponse
    {
        $email = 'lastride25@naver.com';

        SendTestMailJob::dispatch($email);

        return response()->json([
            'message' => '큐에 메일 작업을 넣었습니다.',
            'email' => $email,
            'queue_connection' => config('queue.default'),
        ]);
    }
}
