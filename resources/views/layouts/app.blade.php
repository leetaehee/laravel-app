<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        {{-- 공통 및 외부 라이브러리 스크립트 --}}
        @include('partials.head-scripts')

        {{-- 스타일 페이지를 경로를 올려야 하는 경우 <script src=".."></script> --}}
        {{-- 자식뷰에서 @push('scripts') @endpush --}}
        @stack('scripts')
        
        {{-- 공통 및 외부 라이브러리 스타일 --}}
        @include('partials.head-styles')

        {{-- 스타일 페이지를 경로를 올려야 하는 경우 <like rel="stylesheet" href="..." /> --}}
        {{-- 자식뷰에서 @push('styles') @endpush --}}
        @stack('styles')

        {{--스타일 단일 페이지 --}}
        {{-- 자식뷰에서 @section('style') @endsection --}}
        @yield('style')
        
        <title>{{ config('app.name') }} :: @yield('title', '홈')</title>
    </head>
    <body>
        {{-- 레이아웃 헤더 --}}
        @include('layouts.header')

        {{-- 레이아웃 사이드바 (모바일) --}}
        @include('layouts.side')

        <div class="container-fluid px-3 px-lg-4 py-4 flex-grow-1">
            <div class="row g-4">
                @unless (request()->route('hideSide'))
                    <aside class="col-lg-3 d-none d-lg-block">
                        <div class="sidebar-panel text-white rounded-3 p-4 h-100">
                            <h6 class="text-uppercase text-secondary small">프로그램</h6>
                            <nav class="nav flex-column gap-2 mt-3">
                                <a class="nav-link text-white" href="#">릴리즈 노트</a>
                                <a class="nav-link text-white" href="#">업그레이드 가이드</a>
                                <a class="nav-link text-white" href="#">가이드</a>
                                <a class="nav-link text-white" href="#">API 문서</a>
                                <a class="nav-link text-white" href="#">커뮤니티</a>
                                <a class="nav-link text-white" href="#">공지사항</a>
                                <a class="nav-link text-white" href="#">문의하기</a>
                            </nav>
                        </div>
                    </aside>
                @endunless

                {{-- 본문 컨텐츠 --}}
                @yield('content')
            </div>
        </div>

        {{-- 레이아웃 풋터 --}}
        @include('layouts.footer')
        
        {{-- 스크립트 단일 페이지 --}}
        @yield('script')
    </body>
</html>
