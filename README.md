# capgemini

## Criar o arquivo .env
```
cp .env.example .env
```

## Publica o JWT
```
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```

### Cria a key para o JWT
```
php artisan jwt:secret
```

### Cria o banco sqlite
```
touch /var/www/html/api/database/database.sqlite
```

### Executa as migrations
```
php artisan migrate
```

### Executa o seed
```
php artisan db:seed
```
