@extends('layouts.app')

@section('title', '회원가입')

@section('content')
    <div class="col-12">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-7 col-xl-6">
                <div class="border border-2 border-secondary-subtle rounded-4 bg-white p-4 p-md-5 shadow-sm" style="font-family: 'Noto Sans KR', 'Apple SD Gothic Neo', var(--bs-font-sans-serif);">
                    <div class="text-center fs-3 fw-bold text-secondary mb-4" style="letter-spacing: 0;">Welcome, new member!</div>

                    <div class="alert alert-warning d-flex align-items-center gap-2 small mb-4" role="alert">
                        <span class="badge text-bg-warning text-dark">경고</span>
                        <span>회원가입 실패사유를 확인하세요.</span>
                    </div>

                    <form id="form_register" name="form_register" method="POST" action="{{ route('users.register') }}">
                        @csrf
                        <div class="w-100">
                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">이메일</label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="example@email.com"
                                    value=""
                                >
                                <div class="invalid-feedback d-block small text-break">
                                    이메일 주소를 입력해주세요.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">비밀번호</label>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="******"
                                    value=""
                                >
                                <div class="invalid-feedback d-block small text-break">
                                    비밀번호를 입력해주세요.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">비밀번호 확인</label>
                                <input
                                    type="password"
                                    id="password_confirm"
                                    name="password_confirm"
                                    class="form-control"
                                    placeholder="******"
                                    value=""
                                >
                                <div class="invalid-feedback d-block small text-break">
                                    비밀번호가 일치하지 않습니다.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">이름</label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    class="form-control"
                                    placeholder="홍길동"
                                    value=""
                                >
                                <div class="invalid-feedback d-block small text-break">
                                    이름을 입력해주세요.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">닉네임</label>
                                <input
                                    type="text"
                                    id="nick_name"
                                    name="nick_name"
                                    class="form-control"
                                    placeholder="닉네임을 입력해주세요"
                                    value=""
                                >
                                <div class="invalid-feedback d-block small text-break">
                                    닉네임을 입력해주세요.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">생년월일</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white text-secondary">
                                        <i class="bi bi-calendar-event"></i>
                                    </span>
                                    <input
                                        type="text"
                                        id="birth_date"
                                        name="birth_date"
                                        class="form-control"
                                        placeholder="1989-11-17"
                                        value=""
                                    >
                                </div>
                                <div class="invalid-feedback d-block small text-break">
                                    생년월일을 입력해주세요.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small d-block">성별</label>
                                <div class="d-flex flex-wrap gap-3">
                                    <div class="form-check">
                                        <input
                                            type="radio"
                                            id="sex_man"
                                            name="sex"
                                            class="form-check-input"
                                            value="M"
                                        >
                                        <label class="form-check-label" for="sex_man">남성</label>
                                    </div>
                                    <div class="form-check">
                                        <input
                                            type="radio"
                                            id="sex_woman"
                                            name="sex"
                                            class="form-check-input"
                                            value="W"
                                        >
                                        <label class="form-check-label" for="sex_woman">여성</label>
                                    </div>
                                </div>
                                <div class="invalid-feedback d-block small text-break">
                                    성별을 선택해주세요.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">핸드폰</label>
                                <input
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    class="form-control"
                                    placeholder="01012345678"
                                    inputmode="numeric"
                                    pattern="[0-9]*"
                                    value=""
                                >
                                <div class="invalid-feedback d-block small text-break">
                                    핸드폰 번호를 입력해주세요.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">주소</label>
                                <input
                                    type="text"
                                    id="address"
                                    name="address"
                                    class="form-control"
                                    placeholder="서울특별시 강남구 테헤란로 123"
                                    value=""
                                >
                                <div class="invalid-feedback d-block small text-break">
                                    주소를 입력해주세요.
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input
                                        type="checkbox"
                                        id="personal_info_agree"
                                        name="personal_info_agree"
                                        class="form-check-input"
                                        checked
                                        value="Y"
                                    >
                                    <label class="form-check-label" for="personal_info_agree">개인정보동의(필수)</label>
                                </div>
                                <div class="invalid-feedback d-block small text-break">
                                    개인정보 동의가 필요합니다.
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input
                                        type="checkbox"
                                        id="marketing_info_agree"
                                        name="marketing_info_agree"
                                        class="form-check-input"
                                        value="Y"
                                    >
                                    <label class="form-check-label" for="marketing_info_agree">마케팅동의</label>
                                </div>
                                <div class="invalid-feedback d-block small text-break">
                                    마케팅 동의 여부를 선택해주세요.
                                </div>
                            </div>

                            <button type="button" id="btn_join_completed" class="btn btn-dark border-0 w-100">회원가입 완료</button>
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
            initBirthDatePicker('#birth_date');

            $("#btn_join_completed").on("click", function() {
                if ($.trim($('#email').val()) === '') {
                    alert('이메일을 입력해주세요.');
                    $('#email').focus();
                    return;
                }

                if ($.trim($('#password').val()) === '') {
                    alert('비밀번호를 입력해주세요.');
                    $('#password').focus();
                    return;
                }

                if ($.trim($('#password_confirm').val()) === '') {
                    alert('비밀번호 확인을 입력해주세요.');
                    $('#password_confirm').focus();
                    return;
                }

                if ($('#password').val() !== $('#password_confirm').val()) {
                    alert('비밀번호와 비밀번호 확인 값이 일치하지 않습니다.');
                    $('#password_confirm').focus();
                    return;
                }

                if ($.trim($('#name').val()) === '') {
                    alert('이름을 입력해주세요.');
                    $('#name').focus();
                    return;
                }

                if ($.trim($('#nick_name').val()) === '') {
                    alert('닉네임을 입력해주세요.');
                    $('#nick_name').focus();
                    return;
                }

                if ($.trim($('#birth_date').val()) === '') {
                    alert('생년월일을 입력해주세요.');
                    $('#birth_date').focus();
                    return;
                }

                if ($.trim($('#phone').val()) === '') {
                    alert('핸드폰을 입력해주세요.');
                    $('#phone').focus();
                    return;
                }

                if ($.trim($('#address').val()) === '') {
                    alert('주소을 입력해주세요.');
                    $('#address').focus();
                    return;
                }

                if ($('input[name="sex"]').is(':checked') === false) {
                    alert('성별 값을 입력해주세요.');
                    $('#sex_man').focus();
                    return;
                }

                if (!$('#personal_info_agree').is(':checked')) {
                    alert('개인정보동의 체크해주세요.');
                    $('#personal_info_agree').focus();
                    return;
                }

                $("#form_register").submit();
            });
        });
    </script>
@endsection
