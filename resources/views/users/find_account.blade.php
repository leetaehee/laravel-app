@extends('layouts.app')

@section('title', '계정 찾기')

@section('content')
    <div class="col-12">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-6 col-xl-5">
                <div class="border border-2 border-secondary-subtle rounded-4 bg-white p-4 p-md-5 shadow-sm" style="font-family: 'Noto Sans KR', 'Apple SD Gothic Neo', var(--bs-font-sans-serif);">
                    <div class="text-center fs-2 fw-bold text-secondary mb-4" style="letter-spacing: 0.1em;">Find Account</div>

                    @if (session('status'))
                        <div class="alert alert-info">{{ session('status') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-warning d-flex align-items-center gap-2 small mb-4" role="alert">
                            <span class="badge text-bg-warning text-dark">경고</span>
                            <span>계정 찾기 실패 사유를 확인해주세요.</span>
                        </div>
                    @endif

                    <form
                        id="form_find_account"
                        name="form_find_account"
                        method="POST"
                        action="{{ route('password.request.account_email') }}"
                        data-cooldown-started="{{ session('cooldown_started', false) ? 1 : 0 }}"
                    >
                        @csrf
                        <div class="w-100">
                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">Email</label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="example@email.com"
                                    value="{{ old('email') }}"
                                >
                                @error('email')
                                    <div class="invalid-feedback d-block small text-break">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="button" id="btn_find_account" class="btn btn-dark border-0 w-100">재설정 메일보내기</button>
                            <div class="d-flex justify-content-end align-items-center gap-2 mt-3">
                                <a href="{{ route('register.form') }}" class="link-primary small text-decoration-none">회원가입</a>
                                <a href="{{ route('login') }}" class="link-primary small text-decoration-none">로그인</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {

            $('#btn_find_account').on("click", function() {
                if ($.trim($('#email').val()) === '') {
                    alert('이메일을 입력해주세요.');
                    $('#email').focus();
                    return;
                }

                $("#form_find_account").submit();
            });
        });
    </script>
@endsection
