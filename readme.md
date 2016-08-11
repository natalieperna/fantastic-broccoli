# Fantastic Broccoli

## Install
```
git clone git@github.com:natalieperna/fantastic-broccoli.git
```

Point web root to `public`

```
composer install
cp .env.example .env
php artisan key:generate
```

Configure database in `.env`

```
php artisan migrate
```

```
chmod 777 -R storage
chmod 777 -R bootstrap/cache
```

## Deploy

### Heroku
```
heroku create
heroku buildpacks:set heroku/php
heroku config:set APP_KEY=$(php artisan --no-ansi key:generate --show)
heroku config:set APP_LOG=errorlog
heroku config:set DB_CONNECTION=...
heroku config:set DB_HOST=...
heroku config:set DB_DATABASE=...
heroku config:set DB_PORT=...
heroku config:set DB_USERNAME=...
heroku config:set DB_PASSWORD=...
git push heroku master
heroku open
```

### Amazon EBS
```
eb init -p PHP
eb platform select
```

Select PHP 5.6

```
eb create fantastic-broccoli
eb open
```
