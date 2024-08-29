## Tech
- PHP 8.2
- Laravel 11
- MySQL

## Instalation

Clone Project

```bash
  git clone https://github.com/TahsinulAmir/Test-ObjiDev.git
```

Install dependencies

```bash
  composer install
```

Copy env.example menjadi .env dan setting .env

```bash
  cp env .env
```

Jalankan Migration

```bash
  php artisan migrate
```

Jalankan Seeder

```bash
  php artisan db:seed UserSeeder
  php artisan db:seed KategoriSeeder
  php artisan db:seed PenerbitSeeder
  php artisan db:seed BukuSeeder
```

Jalankan Project

```bash
  php artisan serve
```

Sample Login Admin
- Email : admin@admin.com
- Password : admin123

Sample Login User
- Email : amir@gmail.com
- Password : amir123


