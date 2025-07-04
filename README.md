# Sistema de Votaciones API RESTful (PHP + Laravel + JWT)

Este proyecto es una API RESTful para gestionar un sistema de votaciones con votantes, candidatos y votos, desarrollada en Laravel y protegida con JWT.

---

## Requisitos

- PHP >= 8.0
- Composer
- MySQL
- Postman o `curl` para pruebas

--- Instalación local

1. Clona el repositorio
```bash
git clone https://github.com/mateoHinc/systemvotingAPIREST.git
cd systemvotingAPIREST
```

2. Instalar dependencias
```bash
composer install
```

3. Copia y configura el archivo de entorno
```bash
cp .env.example .env
```

Edita .env para la base de datos
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=systemvoting_db
DB_USERNAME=root
DB_PASSWORD=XXXXXXXXXXXXX
```

4. Ejecutar las migraciones
```bash
php artisan migrate
```
