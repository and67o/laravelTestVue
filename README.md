Test Login
POST http://127.0.0.1:8000/api/v1/login
email=[email]
password=[password]
Example http://127.0.0.1:8000/api/v1/login?email=oleg12@mail.ru&password=123456789

http://127.0.0.1:8000/api/v1/register?name=oleg&email=oleg123@mail.ru&password=123456789&c_password=123456789

http://127.0.0.1:8000/api/v1/posts?page=2

php artisan passport:client --personal

add .env

composer install
npm i
npm run dev

php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link
//php artisan passport:client --personal
php artisan passport:install
php artisan serve
