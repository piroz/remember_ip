# remember_ip

update allowlist of htaccess

# requirements

laravel [`Server Requirements`](https://laravel.com/docs/5.3/installation#server-requirements) section


# installation

```
$ git clone https://github.com/piroz/remember_ip
$ cd remember_ip/private
$ composer install
$ cp .env.example .env
$ vi .env # edit database information
$ php artisan key:generate
$ php artisan migrate:install
$ php artisan migrate
$ php artisan db:seed
```
