NOTE:

FIX BUG EXPORT PDF


FIX BUG IMPORT EXCEL

Masih Banyak kekurangan di dalam projek ini masih banyak bug dan fitur yang harus di implementasikan

Installation
In the root folder, find the .env file and change the following values

APP_NAME=

APP_URL=

DB_DATABASE=

DB_USERNAME=

DB_PASSWORD=


Through terminal or command prompt, update composer to install the dependencies:

composer update
Run the migration command to create the tables

php artisan migrate
Run the seeder to import mandatory values to the tables

php artisan db:seed



Credit To YT:https://www.youtube.com/watch?v=vCgsvdASoJA&list=PLhWDv4Vma6HsSDRgg9PCCJT2CksdydqH8 (Developer Cupu)

Tampilan DASHBOARD

![DASHBOARD](https://github.com/rozalyne/PROJEK_LARAVEL_SIMAK/assets/67235972/1dd1e5b2-6f1d-46a0-8bbb-f7adc1709cbc)


Tampilan Data

![image](https://github.com/rozalyne/PROJEK_LARAVEL_SIMAK/assets/67235972/ffa30202-6cbd-4cb3-ab9d-5826304658ac)


Tampilan Edit Data

![image](https://github.com/rozalyne/PROJEK_LARAVEL_SIMAK/assets/67235972/54da5ad7-a864-47b9-a55e-f8747a4d269d)
