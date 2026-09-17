## Dockerfile — Laravel (burger-back)
## ضعه في جذر المشروع (نفس مكان composer.json)

# ---- مرحلة 1: تثبيت باكدجات composer ----
FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-scripts \
    --no-autoloader \
    --ignore-platform-reqs \
    --prefer-dist

# ---- مرحلة 2: تشغيل التطبيق ----
FROM php:8.2-cli

WORKDIR /app

# مكتبات النظام + إضافات PHP المطلوبة لـ Laravel
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git libpq-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip \
    && rm -rf /var/lib/apt/lists/*

# نسخ الباكدجات اللي اتثبتت في المرحلة الأولى
COPY --from=vendor /app/vendor ./vendor

# نسخ باقي المشروع
COPY . .

RUN composer dump-autoload --optimize --no-dev \
    && php artisan config:clear

# Render (وأغلب المستضيفات المجانية) بتحدد رقم البورت عن طريق متغير PORT
EXPOSE 10000

# عند التشغيل: نعمل migrate ثم نشغّل السيرفر على البورت اللي حدده الاستضافة
CMD sh -c "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"
