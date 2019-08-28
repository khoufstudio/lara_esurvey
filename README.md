
## Konfigurasi Coreengine Laravel


Requirement :

- PHP 7.1 atau diatasnya
- Composer https://getcomposer.org/
- Node JS Versi 10.15 https://nodejs.org/en/

Installasi :

1. Clone Project Coreengine dari git,
2. Setelah di Clone masuk ke folder project kemudian jalankan perintah di terminal/cmd
```sh
composer update
npm install
```
3. Setelah selesai dijalankan, rename file .env.example  menjadi .env , sesuaikan pengaturan di database
4. Jalankan perintah di bawah
```sh
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan passport:install
```
5. Running web dengan menjalankan
```sh
php artisan serve 
```

6. Untuk menjalankan custom port gunakan perintah
```sh
php artisan serve --port=8001 
```
(contohnya menjalankan project di port 8001)


### Referensi Plugin/tools

- HMVC Laravel Modules ([nwidart](https://nwidart.com/laravel-modules/v4/advanced-tools/artisan-commands))

- Seeder ([iseed](https://github.com/orangehill/iseed))

- API ([axios](https://github.com/axios/axios))

