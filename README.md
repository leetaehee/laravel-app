# 티에이치스터디그룹 – Developer Growth Platform

성장하는 개발자가 장인정신을 지닌 리더로 나아가는 과정을 기록하고 운영하는 개발자 성장 플랫폼입니다.

개발, 학습, 기록, 실험, 서비스 운영을 하나의 흐름으로 연결하기 위해 만든 개인 웹 프로젝트입니다. PHP 레거시부터 최신 프레임워크까지 경험한 기술과 새로운 시도를 함께 담고 있습니다.

## 🚀 주요 기능

- 사용자 인증 및 회원 관리
- 게시글 작성 및 콘텐츠 기록
- 로그 기반 운영 관리
- 방문자 및 유입 경로 분석
- 광고 플랫폼 기반 수익화 구조
- PWA 기반 웹앱 실험(예정)

## 🛠️ 사용 기술 스택

- PHP 8.x
- Laravel 10
- MySQL
- Bootstrap 5
- jQuery
- Nginx
- Ubuntu Server

## 💻 설치 및 실행 방법 (로컬)

```bash
git clone https://github.com/leetaehee/laravel-app.git
cd laravel-app

composer install
cp .env.example .env
php artisan key:generate

php artisan migrate
php artisan serve
```

## 🔑 필수 환경변수 (.env)

```env
APP_NAME="TH Group"
APP_ENV=local
APP_KEY=base64:...
APP_URL=http://localhost

DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_app
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=your-email
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email
MAIL_FROM_NAME="TH Group"
```

## 🚀 배포 및 운영

- GitHub 기반 소스 관리
- Ubuntu 서버 환경 운영
- 환경변수 분리 관리
- 캐시 및 설정 최적화
- 서버 직접 구성 및 운영 경험 기반 배포

## 🔚 마무리 한 줄

티에이치스터디그룹은 하나의 사이트가 아니라, 개발자로서의 성장 과정을 담는 플랫폼이다.
