# capgemini

### Criar o arquivo .env
```
cp .env.example .env
```

### Publicar o JWT
```
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```

### Criar a key para o JWT
```
php artisan jwt:secret
```

### Criar o banco sqlite
```
touch /var/www/html/api/database/database.sqlite
```

### Executar a criação das tabelas
```
php artisan migrate
```

### Executar a carga inicial das tabelas
```
php artisan db:seed
```
