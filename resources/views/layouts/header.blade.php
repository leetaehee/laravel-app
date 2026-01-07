<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid px-3 px-lg-4">
        <div class="d-flex align-items-center w-100 d-lg-none">
        @if (request()->route('hideSide'))
            <a
                class="navbar-toggler border-0 text-decoration-none"
                href="{{ config('app.url') }}"
                aria-label="Go to home">
                <i class="bi bi-house-door-fill fs-4" aria-hidden="true"></i>
            </a>
        @else
            <button 
                class="navbar-toggler border-0" 
                type="button"
                data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar"
                aria-label="Toggle sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>
        @endif
        <a class="navbar-brand fw-semibold mx-auto mb-0 text-decoration-none" href="{{ config('app.url') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#topNav" aria-controls="topNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
        <a class="d-none d-lg-inline-flex align-items-center text-decoration-none me-3 text-white" href="{{ config('app.url') }}" aria-label="Go to home">
            <i class="bi bi-house-door-fill fs-5" aria-hidden="true"></i>
        </a>
        <a class="navbar-brand fw-semibold d-none d-lg-inline-flex text-decoration-none" href="{{ config('app.url') }}">{{ config('app.name') }}</a>
        <div class="collapse navbar-collapse mt-3 mt-lg-0" id="topNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">소개</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('photo.index') }}">사진관리</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('video.index') }}">영상관리</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">정보관리</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('map.index') }}">장소관리</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('document.index') }}">문서관리</a></li>
            <li class="nav-item dropdown nav-dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">마이페이지</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">테스트</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown nav-dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">관리자</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">테스트</a></li>
                </ul>
            </li>
        </ul>
        <!-- 로그인 -->
        <div class="dropdown auth-dropdown">
            <button class="btn btn-outline-light dropdown-toggle d-flex align-items-center auth-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-box-arrow-in-right me-1" aria-hidden="true"></i>Start
            </button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-2" aria-hidden="true"></i>로그인</a></li>
            <li><a class="dropdown-item" href="{{ route('join') }}"><i class="bi bi-person-plus me-2" aria-hidden="true"></i>회원가입</a></li>
            </ul>
        </div>
        <!-- 마이페이지 (로그인후) -->
        <!-- 
        <button class="btn btn-outline-light d-flex align-items-center auth-btn" type="button">
            <i class="bi bi-person-circle me-1" aria-hidden="true"></i>My Page
        </button>
        -->
        </div>
    </div>
</nav>
