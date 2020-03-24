#Testing project
For improve my knowledge in Laravel and Vue.js in practise

#Api

| METHOD | URL |
| ------ | ------ |
| POST | /api/v1/login?email=oleg12@mail.ru&password=123456789 |
| POST | /api/v1/register?name=oleg&email=oleg123@mail.ru&password=123456789&c_password=123456789 |
| GET | /api/v1/posts?page=2 |
| GET | /api/v1/post/show/1 |

#Installation

add .env

```sh
$ composer install
$ npm i
$ npm run dev
```
```sh
php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```
