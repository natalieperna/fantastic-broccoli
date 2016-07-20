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
