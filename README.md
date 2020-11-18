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


## Rotas

**Autenticação**

post http://localhost:8000/api/login

body params {
  agency: '',
  account: '',
  password: ''
}

**Dados do usuário autenticado**

get http://localhost:8000/api/user

header {
  Authorization: Bearer token
}
  
**Saldo da conta**

get http://localhost:8000/api/balance/{id}

header {
  Authorization: Bearer token
}

**Extrato**

get http://localhost:8000/api/wallet/{id

header {
  Authorization: Bearer token
}

**Saque | Depósito | Transferência**
    
patch http://localhost:8000/api/wallet/{id}

body params {
  transaction: '',
  user_destination_id: '',
  amount: ''
}

header {
  Authorization: Bearer token
}

**Lista de usuários**

get http://localhost:8000/api/usersWallet/{id}

header {
  Authorization: Bearer token
}

** Saída

get http://localhost:8000/api/logout'

header {
  Authorization: Bearer token
}

### Dados para teste

#### Login

{
    [
         'agency' => '0001',
         'account' => '123654',
         'password' => 'password'
    ],
    [
         'agency' => '0001',
         'account' => '123984',
         'password' => 'password'
    ],
    [
         'agency' => '0002',
         'account' => '234123',
         'password' => 'password'
    ],
    [
         'agency' => '0002',
         'account' => '234552',
         'password' => 'password'
    ]
}

#### Tipos de transação

{
    [
        'transaction' => '2',
        'description' => 'Débito Transferência' 
    ],
    [
        'transaction' => '4',
        'description' => 'Depósito' 
    ],
    [
        'transaction' => '5',
        'description' => 'Saque' 
]
}
