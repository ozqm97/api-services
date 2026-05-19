# Rutas

## Resumen de organización

El proyecto usa dos archivos de rutas principales:

- `routes/api.php` — endpoints de API REST.
- `routes/web.php` — página de bienvenida y rutas duplicadas para login/CRM.

## Observaciones

- Existen rutas duplicadas entre `api.php` y `web.php` para autenticación y CRM.
- Las rutas no aplican versionado (`/v1`, `/v2` solo en login, no en dominios).
- No hay un `Route::apiResource()` consistente; los endpoints se definen manualmente.
- El prefijo `/crm` contiene mix de recursos CRUD y acciones específicas.

## Estructura detectada

### `routes/api.php`

- `recaptcha/*`
- `login/*`
- `operadora/*`
- `bitacora/*`
- `crm/*`

### `routes/web.php`

- `/`
- `login/*` (duplicado)
- `crm/*` (duplicado para algunos flujos protegidos por `auth:sanctum`)

## Recomendaciones

- Unificar rutas de API dentro de un único archivo si la aplicación es mayormente API-first.
- Extraer rutas de CRM y bitácora a archivos de rutas `routes/crm.php`, `routes/bitacora.php`, `routes/operadora.php`.
- Añadir versionado en el futuro:
    - `api/v1/operadora/...`
    - `api/v1/bitacora/...`
    - `api/v1/crm/...`
- Evitar rutas ambiguas entre `api` y `web` para no mezclar lógica de sesión y APIs públicas.
