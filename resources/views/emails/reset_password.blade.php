<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>비밀번호 재설정 안내</title>
    </head>
    <body style="margin: 0; padding: 0; background: #f5f7fb; font-family: 'Apple SD Gothic Neo', 'Malgun Gothic', Arial, sans-serif; color: #1f2937;">
        <div style="max-width: 600px; margin: 0 auto; padding: 28px 16px 40px;">
            <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 28px 24px; box-shadow: 0 6px 20px rgba(15, 23, 42, 0.06);">
                <h1 style="font-size: 20px; margin: 0 0 12px; font-weight: 700;">비밀번호 재설정 안내</h1>
                <p style="font-size: 14px; line-height: 1.6; margin: 0 0 12px;">
                    안녕하세요.
                </p>
                <p style="font-size: 14px; line-height: 1.6; margin: 0 0 12px;">
                    <strong>{{ $email }}</strong> 계정으로 비밀번호 재설정 요청이 접수되어 안내드립니다.
                    아래 버튼을 눌러 비밀번호를 재설정해 주세요.
                </p>

                <div style="text-align: center; margin: 20px 0 22px;">
                    <a href="{{ $returnUrl }}" target="_blank" rel="noopener" style="display: inline-block; background: #2563eb; color: #ffffff !important; text-decoration: none; padding: 12px 18px; border-radius: 8px; font-weight: 600; font-size: 14px;">
                        비밀번호 재설정하기
                    </a>
                </div>

                <p style="font-size: 12px; color: #6b7280; margin: 16px 0 6px;">
                    버튼이 열리지 않으면 아래 링크를 복사해 브라우저에 붙여넣어 주세요.
                </p>
                <a href="{{ $returnUrl }}" style="font-size: 12px; word-break: break-all; color: #2563eb;">{{ $returnUrl }}</a>
            </div>

            <div style="text-align: center; font-size: 12px; color: #6b7280; margin-top: 18px;">
                고객님께서 요청하지 않으셨다면, 이 안내는 별도 조치 없이 지나쳐 주셔도 됩니다.
            </div>
        </div>
    </body>
</html>
