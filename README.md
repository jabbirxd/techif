# Techif Store

A complete e-commerce web app built with Laravel — my solo university field work project (2025).

## What it does

**Storefront**
- Product catalog with categories, brands, colors and images
- Cart and wishlist (built with Livewire)
- Checkout with Cash on Delivery and a PayPal option
- Order history
- Login, registration and password reset

**Admin panel**
- Manage products, categories, colors, sliders, orders, users and site settings
- Role-based admin access

## Stack

PHP · Laravel 10 · Livewire 3 · Blade · MySQL

## Run it locally

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

> Note: this project was built to run locally for my university field work. It was never deployed.
