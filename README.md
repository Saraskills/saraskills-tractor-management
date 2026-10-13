# SaraSkills Tractor Management

A Laravel 10/11 + Vue 3 SaaS website for SaraSkills with public pages, pricing API, auth, contact forms, dashboards, and responsive design.

## Features

- Laravel backend with Sanctum API auth
- Vue 3 SPA with router and reusable components
- Public pages: Home, About, Pricing, Contact, Login, Signup, Forgot Password, Reset Password
- Protected Dashboard, Profile, Settings pages
- MySQL migrations and seeders
- Contact form and pricing data API
- Dynamic page metadata and responsive SaaS UI

## Local setup

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
npm run dev
php artisan serve
```

## MySQL config

```env
DB_CONNECTION=mysql
DB_DATABASE=saraskills
DB_USERNAME=root
DB_PASSWORD=
```

## Demo Credentials

- Email: demo@saraskills.com
- Password: password
