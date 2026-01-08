@extends('layouts.app')

@section('title', '회원가입')

@section('content')
    <div class="col-12">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-7 col-xl-6">
                <div class="border border-2 border-secondary-subtle rounded-4 bg-white p-4 p-md-5 shadow-sm" style="font-family: 'Noto Sans KR', 'Apple SD Gothic Neo', var(--bs-font-sans-serif);">
                    <div class="text-center fs-3 fw-bold text-secondary mb-4" style="letter-spacing: 0;">Welcome, new member!</div>

                    <form>
                        <div class="w-100">
                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">이메일</label>
                                <input type="email" class="form-control" placeholder="example@email.com">
                                <div class="invalid-feedback d-block small text-break">
                                    이메일 주소를 입력해주세요.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">비밀번호</label>
                                <input type="password" class="form-control" placeholder="******">
                                <div class="invalid-feedback d-block small text-break">
                                    비밀번호를 입력해주세요.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">비밀번호 확인</label>
                                <input type="password" class="form-control" placeholder="******">
                                <div class="invalid-feedback d-block small text-break">
                                    비밀번호가 일치하지 않습니다.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">이름</label>
                                <input type="text" class="form-control" placeholder="홍길동">
                                <div class="invalid-feedback d-block small text-break">
                                    이름을 입력해주세요.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">닉네임</label>
                                <input type="text" class="form-control" placeholder="닉네임을 입력해주세요">
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
                                    <input type="text" class="form-control" id="birthdate" placeholder="1989-11-17">
                                </div>
                                <div class="invalid-feedback d-block small text-break">
                                    생년월일을 입력해주세요.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small d-block">성별</label>
                                <div class="d-flex flex-wrap gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender-male">
                                        <label class="form-check-label" for="gender-male">남성</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender-female">
                                        <label class="form-check-label" for="gender-female">여성</label>
                                    </div>
                                </div>
                                <div class="invalid-feedback d-block small text-break">
                                    성별을 선택해주세요.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">핸드폰</label>
                                <input type="tel" class="form-control" placeholder="01012345678" inputmode="numeric" pattern="[0-9]*">
                                <div class="invalid-feedback d-block small text-break">
                                    핸드폰 번호를 입력해주세요.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary fw-semibold small">주소</label>
                                <input type="text" class="form-control" placeholder="서울특별시 강남구 테헤란로 123">
                                <div class="invalid-feedback d-block small text-break">
                                    주소를 입력해주세요.
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="agree-privacy" checked>
                                    <label class="form-check-label" for="agree-privacy">개인정보동의(필수)</label>
                                </div>
                                <div class="invalid-feedback d-block small text-break">
                                    개인정보 동의가 필요합니다.
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="agree-marketing">
                                    <label class="form-check-label" for="agree-marketing">마케팅동의</label>
                                </div>
                                <div class="invalid-feedback d-block small text-break">
                                    마케팅 동의 여부를 선택해주세요.
                                </div>
                            </div>

                            <button type="submit" class="btn btn-dark border-0 w-100">회원가입 완료</button>
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
            initBirthDatePicker('#birthdate');
        });
    </script>
@endsection
