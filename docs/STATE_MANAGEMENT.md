# State Management

## Estado en el backend

### Sesiones

- Laravel usa `SESSION_DRIVER=database` por defecto.
- El flujo `loginContravel` crea sesión usando `Auth::login()` y `session()->regenerate()`.
- El logout limpia cookies `laravel_session` y `XSRF-TOKEN`.

### Autenticación token

- Hay un estado implícito en JWT generado por `TokenManage::generateToken()`.
- Los tokens contienen `id`, `sub`, `iat`, `exp`, `status` y `uuid`.
- El estado del token se interpreta en varios controladores con `validateToken()`.

### Guard de usuario

- `config/auth.php` apunta al modelo `App\Models\tablero\Contravel_user`.
- El guard `web` utiliza session storage.
- No hay un guard `api` definido explícitamente en la configuración.

## Estado en el frontend

- No existe un estado de React/Next.js en este repositorio.
- El frontend es un cliente JavaScript ligero con `axios` y `laravel-echo`.
- No hay hooks o store global definidos en el código fuente actual.

## Observaciones

- El estado de la aplicación no está centralizado: hay mezcla de sesión y token en la misma base de código.
- Esto dificulta la coherencia de autorización en las rutas y el lifecycle del usuario.
- No se detectan patrones dedicados de gestión de estado más allá de la sesión de Laravel.
