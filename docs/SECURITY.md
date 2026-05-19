# Seguridad

## Riesgos identificados

### 1. Middleware JWT inseguro

- `App\Http\Middleware\CheckBearerToken` solo comprueba que exista un bearer token.
- No valida la firma ni la expiración.
- Esto permite que peticiones con tokens falsos o expirados pasen si están presentes en la cabecera.

### 2. CORS demasiado permisivo

- `config/cors.php` permite `allowed_origins: ['*']` y `allowed_headers: ['*']` con `supports_credentials=true`.
- En producción esto es una configuración de alto riesgo.

### 3. Autenticación inconsistente

- `loginContravel` mezcla sesión de Laravel con JWT.
- `loginAgencies` devuelve un JWT sin asegurar un patrón consistente.
- No hay claridad en qué rutas usan Sanctum versus JWT.

### 4. Broadcast expuesto

- Canal `user.{user}` en `routes/channels.php` devuelve `true` sin validaciones.
- El broadcast no restringe la suscripción por el identificador del usuario conectado.

### 5. Datos sensibles en configuración

- `JWT_SECRET` y credenciales de múltiples bases de datos deben mantenerse fuera del repositorio.
- El `.env.example` está bien, pero se debe enfatizar gestión segura de secretos en producción.

## Buenas prácticas a aplicar

- Reemplazar `CheckBearerToken` por un middleware que valide JWT.
- Usar `auth:sanctum` para rutas cookie/session y `auth:api` o JWT para APIs token.
- Restringir CORS a orígenes conocidos.
- Limitar el broadcast a canales autorizados por usuario.
- Hacer que los mailables que implementan `ShouldQueue` funcionen con workers seguros.

## Seguridad de datos

- El esquema de permisos se basa en `role_permissions` y `user_roles`, pero la lógica de autorización no es uniforme.
- Debe definirse una capa de autorización global o políticas con `Gate`/`Policy`.

## Observación específica

- `TokenManage::generateToken()` registra el payload en los logs y podría exponer datos sensibles si los logs no están protegidos.
