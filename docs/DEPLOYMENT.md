# Deployment

## Requisitos

- PHP ^8.3
- Composer
- Node.js / npm
- MySQL / MariaDB para las conexiones `mysql*`
- SQLite para desarrollo local si se usa `DB_CONNECTION=sqlite`
- Extensiones PHP de Laravel: PDO, OpenSSL, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath, Fileinfo

## Comandos útiles

- `composer install`
- `npm install`
- `npm run build`
- `php artisan migrate --force`
- `php artisan queue:listen --tries=1 --timeout=0`
- `php artisan serve`

## Scripts definidos en package.json

- `setup`: instala dependencias, configura `.env`, genera `APP_KEY`, migra y construye assets.
- `dev`: ejecuta servidor Laravel, queue listener, pail y Vite en paralelo.
- `test`: ejecuta pruebas con `php artisan test`.

## Configuraciones de entorno

- `APP_ENV`
- `APP_DEBUG`
- `APP_URL`
- `DB_CONNECTION` / `DB_DATABASE` / `DB_USERNAME` / `DB_PASSWORD`
- `SESSION_DRIVER`
- `CACHE_STORE`
- `QUEUE_CONNECTION`
- `JWT_SECRET`
- `BROADCAST_CONNECTION`
- `MAIL_MAILER`

## Recomendaciones de despliegue

- En producción, usar `APP_DEBUG=false`.
- Usar un backend de caché compartido como Redis.
- Configurar workers de queue con supervisión y retries.
- Configurar logs rotativos (`daily`) y un canal remoto cuando sea necesario.
- Proteger los secretos de base de datos, `JWT_SECRET` y credenciales de broadcast.
