@extends('layouts.app')

@section('title', '로그인')

@section('content')
    <div class="col-12">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-6 col-xl-5">
                <div class="border border-2 border-secondary-subtle rounded-4 bg-white p-4 p-md-5 shadow-sm" style="font-family: 'Noto Sans KR', 'Apple SD Gothic Neo', var(--bs-font-sans-serif);">
                    <div class="text-center fs-2 fw-bold text-secondary mb-4" style="letter-spacing: 0.2em;">Welcome Login!</div>

                    <form>
                        <div class="w-100">
                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">Email</label>
                                <input type="email" class="form-control" placeholder="developerkimtakgu@gmail.com">
                                <div class="invalid-feedback d-block small text-break">
                                    이메일 주소가 중복됩니다.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">비밀번호</label>
                                <input type="password" class="form-control is-invalid" placeholder="******">
                            </div>
                            <div class="invalid-feedback d-block small mb-3 text-break">
                                비밀번호가 일치하지않습니다.
                            </div>

                            <div class="d-flex justify-content-between align-items-center my-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember">
                                    <label class="form-check-label" for="remember">자동로그인</label>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <a href="{{ route('join') }}" class="link-primary small text-decoration-none">회원가입</a>
                                    <a href="#" class="link-primary small text-decoration-none">계정찾기</a>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-dark border-0 w-100">로그인</button>
                        </div>
                    </form>

                    {{--
                    <div class="pb-2">
                        <div class="d-flex align-items-center gap-2 text-muted small my-3">
                            <span class="flex-grow-1 border-top"></span>
                            <span class="px-2">or</span>
                            <span class="flex-grow-1 border-top"></span>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-warning text-dark border-0 w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                소셜 로그인
                            </button>
                            <ul class="dropdown-menu w-100">
                                <li><a class="dropdown-item" href="#">카카오</a></li>
                                <li><a class="dropdown-item" href="#">네이버</a></li>
                                <li><a class="dropdown-item" href="#">페이스북</a></li>
                                <li><a class="dropdown-item" href="#">구글</a></li>
                            </ul>
                        </div>
                    </div>
                    --}}
                </div>
            </div>
        </div>
    </div>
@endsection
