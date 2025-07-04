# Sistema de Votaciones API RESTful (PHP + Laravel + JWT)

Este proyecto es una API RESTful para gestionar un sistema de votaciones con votantes, candidatos y votos, desarrollada en Laravel y protegida con JWT.

---

## Requisitos

- PHP >= 8.0
- Composer
- MySQL
- Postman para pruebas

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

5. Levanta el servidor
```bash
php artisan serve
```
Accede a la API: http://127.0.0.1:8000

# 🔌 Endpoints Principales

| Método | Endpoint                   | Descripción                       |
|--------|----------------------------|-----------------------------------|
| POST   | `/api/auth/register`       | Registrar un nuevo usuario        |
| POST   | `/api/auth/login`          | Iniciar sesión                    |
| GET    | `/api/auth/me`             | Obtener usuario autenticado       |
| POST   | `/api/auth/logout`         | Cerrar sesión                     |
| POST   | `/api/voters`              | Crear votante                     |
| GET    | `/api/voters`              | Listar votantes                   |
| GET    | `/api/voters/{id}`         | Obtener información votante       |
| GET    | `/api/voters/filter`       | Filtrar y Paginar votantes        |
| POST   | `/api/candidates`          | Crear candidatos                  |
| GET    | `/api/candidates`          | Listar candidatos                 |
| GET    | `/api/candidates/{id}`     | Obtener información candidato     |
| GET    | `/api/candidates/filter`   | Filtrar y Paginar candidatos      |
| POST   | `/api/votes`               | Emitir voto                       |
| GET    | `/api/votes/statistics`    | Ver estadísticas de votación      |

