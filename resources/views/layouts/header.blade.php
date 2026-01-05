<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid px-3 px-lg-4">
        <div class="d-flex align-items-center w-100 d-lg-none">
        <button 
            class="navbar-toggler border-0" 
            type="button"
            @unless (request()->route('hideSide'))
                data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar"
            @endunless
            aria-label="Toggle sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <span class="navbar-brand fw-semibold mx-auto mb-0">{{ config('app.name') }}</span>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#topNav" aria-controls="topNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
        <a class="navbar-brand fw-semibold d-none d-lg-inline-flex" href="#">{{ config('app.name') }}</a>
        <div class="collapse navbar-collapse mt-3 mt-lg-0" id="topNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">학습자료</a></li>
            <li class="nav-item"><a class="nav-link" href="#">스터디/행사</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Q&amp;A</a></li>
        </ul>
        <!-- 로그인 -->
        <div class="dropdown auth-dropdown">
            <button class="btn btn-outline-light dropdown-toggle d-flex align-items-center auth-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-box-arrow-in-right me-1" aria-hidden="true"></i>로그인
            </button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-in-right me-2" aria-hidden="true"></i>로그인</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-person-plus me-2" aria-hidden="true"></i>회원가입</a></li>
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
