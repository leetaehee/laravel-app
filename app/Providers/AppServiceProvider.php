<?php

namespace App\Providers;

use App\Support\QueryLogger;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot()
    {
        $isLocal = app()->isLocal();
        if (!$isLocal) {
            // 로컬 아닌 경우 실행안함
            // 운영, 로컬 모두 하는 건 클래스를 만들고 app.php에 등록할 것 
            return;
        }

        QueryLogger::boot();
    }
}
