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

---

# Nota técnica sobre el problema de autenticación de usuario con JWT

Durante la implementación del sistema de autenticación con JWT (JSON Web Token) en el proyecto API RESTful del sistema de votaciones, se presentó un problema técnico al intentar registrar nuevos usuarios y generar el token correspondiente.

# Descripción del problema

Al realizar el registro de un usuario mediante el endpoint POST /api/auth/register, el usuario se creaba correctamente en la base de datos, pero el token JWT no se generaba ni se devolvía en la respuesta como se esperaba. Este comportamiento impedía continuar con el flujo normal de autenticación, ya que el cliente no obtenía el token necesario para acceder a los endpoints protegidos.

De igual forma, durante el inicio de sesión (POST /api/auth/login), se observaron errores al intentar autenticar las credenciales y generar el token JWT, lo que resultaba en una respuesta de error 500 o de credenciales inválidas, incluso con datos correctos.

---

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

---

# Ejemplos de Endpoints

Agregar un votante

![image](https://github.com/user-attachments/assets/fbcd8442-0b6b-4032-b88c-758db5b6d889)

Filtrar y paginar votantes

![image](https://github.com/user-attachments/assets/a4eff081-1dfc-42af-a427-3cef39eb915c)

![image](https://github.com/user-attachments/assets/30d76247-3651-4f30-bea5-fb3eb37b8457)

![image](https://github.com/user-attachments/assets/7ba70dc9-7978-4264-b7cd-117066cb2912)

Agregar un candidato

![image](https://github.com/user-attachments/assets/fab1dcb2-fcf8-4ec3-a2a0-76cda3255408)

Filtrar y paginar candidatos

![image](https://github.com/user-attachments/assets/b6887a8a-3e4b-4f26-a74b-3b5f60d13238)

Emitir un voto

![image](https://github.com/user-attachments/assets/860110b2-e575-4a3e-852d-efccdd0aaa64)

En caso que un votanto quiera votar de nuevo

![image](https://github.com/user-attachments/assets/21747caa-a316-4017-9aff-f2feed3aa533)

Mostrar votos emitidos

![image](https://github.com/user-attachments/assets/d270110b-e256-41ea-8b39-f974ffaad26d)

Ver Estadisticas de votos

![image](https://github.com/user-attachments/assets/9b0a70eb-d8c6-42ef-a00e-1f1a88c6297d)

![image](https://github.com/user-attachments/assets/e33387ed-1f15-4958-bc5a-e2ea6f7a82ed)
