@extends('layouts.app')

@section('title', '비밀번호 재설정')

@section('content')
    <div class="col-12">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-6 col-xl-5">
                <div class="border border-2 border-secondary-subtle rounded-4 bg-white p-4 p-md-5 shadow-sm" style="font-family: 'Noto Sans KR', 'Apple SD Gothic Neo', var(--bs-font-sans-serif);">
                    <div class="text-center fs-2 fw-bold text-secondary mb-4" style="letter-spacing: 0.1em;">Reset Password</div>

                    @if ($errors->any())
                        <div class="alert alert-warning d-flex align-items-center gap-2 small mb-4" role="alert">
                            <span class="badge text-bg-warning text-dark">경고</span>
                            <span>비밀번호 재설정 실패사유를 확인하세요.</span>
                        </div>
                    @endif

                    <form id="form_home_password_change" name="form_home_password_change" method="POST" action="{{ route('password.reset.mail_update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="w-100">
                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">Email</label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="example@email.com"
                                    value="{{ $email }}"
                                    required
                                >
                                @error('email')
                                    <div class="invalid-feedback d-block small text-break">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">새 비밀번호</label>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="새 비밀번호"
                                    required
                                >
                                @error('password')
                                    <div class="invalid-feedback d-block small text-break">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">새 비밀번호 확인</label>
                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    placeholder="새 비밀번호 확인"
                                    required
                                >
                                <div id="password_confirm_msg" class="form-text small text-danger"></div>
                                @error('password_confirmation')
                                    <div class="invalid-feedback d-block small text-break">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="button" id="btn_home_password_change" class="btn btn-dark border-0 w-100">변경</button>
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
            $("#btn_home_password_change").on("click", function() {
                if ($.trim($('#email').val()) === '') {
                    alert('이메일을 입력해주세요.');
                    $('#email').focus();
                    return;
                }

                if ($.trim($('#password').val()) === '') {
                    alert('새 비밀번호를 입력해주세요.');
                    $('#password').focus();
                    return;
                }

                if ($.trim($('#password_confirmation').val()) === '') {
                    alert('새 비밀번호 확인을 입력해주세요.');
                    $('#password_confirmation').focus();
                    return;
                }

                if ($('#password').val() !== $('#password_confirmation').val()) {
                    alert('새 비밀번호와 확인 값이 일치하지 않습니다.');
                    $('#password_confirmation').focus();
                    return;
                }

                $("#form_home_password_change").submit();
            });

            $('#password_confirmation').on('input change', updatePasswordConfirmMsg);
            $('#password').on('input change', updatePasswordConfirmMsg);
        });

        function updatePasswordConfirmMsg() {
            const password = $('#password').val();
            const confirm = $('#password_confirmation').val();
            const $msg = $('#password_confirm_msg');

            if (!confirm) {
                $msg.text('');
                return;
            }

            if (password !== confirm) {
                $msg.text('새 비밀번호와 확인 값이 일치하지 않습니다.');
            } else {
                $msg.text('');
            }
        }
    </script>
@endsection
