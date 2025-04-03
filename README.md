## Requisitos

* PHP 8.2 ou superior
* Composer

## Sequencia para criar o projeto
Criar o projeto com Laravel
```
composer create-project laravel/laravel:^11.0 nome-do-projeto ou .
```

Iniciar o projeto criado com Laravel
```
php artisan serve
```

Acessar o conteúdo padrão do Laravel
```
http://127.0.0.1:8000

## Como rodar o projeto baixado

Duplicar o arquivo ".env.example" e renomear para ".env".<br>

Instalar as dependências do PHP
```
composer install
```

Gerar a chave
```
php artisan key:generate
```

Iniciar o projeto criado com Laravel
```
php artisan serve
```

Acessar o conteúdo padrão do Laravel
```
http://127.0.0.1:8000

Criar a migration
```
php artisan make:migration create_name_table
```
Executar as migrate
```
php artisan migrate