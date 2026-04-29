# Проєкт: Сайт гостьової книги

## Опис
Вебдодаток на Laravel - гостьова книга з реєстрацією, входом та коментарями.
Побудований на архітектурі MVC з використанням фреймворку Laravel.

## Функціонал
- Реєстрація користувача
- Авторизація (вхід / вихід)
- Додавання коментарів
- Перегляд коментарів

## Технології
- PHP 8.2+
- Laravel 12
- MySQL (через XAMPP)
- Blade (шаблонізатор)
- Bootstrap 5 (через CDN)

## Встановлення та запуск

### 1. Встановити залежності
```bash
composer install
```

### 2. Скопіювати .env
```bash
cp .env.example .env
```

### 3. Налаштувати підключення до БД у `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=guestbook
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Запустити XAMPP і активувати MySQL

### 5. Запустити сервер
```bash
php artisan serve
```

Додаток буде доступний за адресою: **http://127.0.0.1:8000**

## Структура проєкту
- `app/Http/Controllers/` — контролери (BaseController + окремі контролери)
- `app/Models/` — моделі (BaseModel, User, Comment)
- `resources/views/` — Blade-шаблони
- `routes/web.php` — маршрути