# Dependency Graph

## Dependencias principales

### PHP / Composer

- `php`: ^8.3
- `laravel/framework`: ^13.0
- `laravel/sanctum`: ^4.3
- `firebase/php-jwt`: ^7.0
- `laravel/reverb`: ^1.8
- `laravel/tinker`: ^3.0

### Desarrollo

- `fakerphp/faker`: ^1.23
- `laravel/pail`: ^1.2.5
- `laravel/pint`: ^1.27
- `mockery/mockery`: ^1.6
- `nunomaduro/collision`: ^8.6
- `phpunit/phpunit`: ^12.5.12

### Node / JavaScript

- `vite`: ^7.0.7
- `@tailwindcss/vite`: ^4.0.0
- `tailwindcss`: ^4.0.0
- `laravel-vite-plugin`: ^2.0.0
- `axios`: ^1.11.0
- `laravel-echo`: ^2.3.1
- `pusher-js`: ^8.4.2
- `concurrently`: ^9.0.1

## Dependencias internas

- `app/Traits/TokenManage.php` usa `firebase/php-jwt`.
- `app/Providers/AppServiceProvider.php` registra rutas de broadcast con `auth:sanctum`.
- `resources/js/echo.js` usa `laravel-echo` y `pusher-js` con el adaptador `reverb`.
- Las clases `App\Mail\*` usan `ShouldQueue` para encolado de correos.

## Dependencias externas observadas

- Servicio SOAP externo: `agent.contravel.com.mx/AuthApi/Login`
- ReCaptcha externa en `App\Http\Controllers\ReCaptchaController`
- Reverb broadcast y Pusher-like websocket
- Email logging puede estar configurado con `MAIL_MAILER=log`

## Dependencias de infraestructura

- Base de datos SQL múltiple (SQLite local y varias conexiones MySQL).
- Configuración de `QUEUE_CONNECTION=database` y `CACHE_STORE=database` por defecto.
- Broadcasting a través de `BROADCAST_CONNECTION=log` en desarrollo.

## Observaciones de acoplamiento

- El sistema está fuertemente acoplado a servicios externos de autenticación y datos.
- Muchos modelos tienen conexiones específicas de base de datos, lo que dificulta un cambio global de persistencia.
- La lógica de negocio mezcla controladores, modelos y consultas directas de DB sin una capa de servicio separada.
