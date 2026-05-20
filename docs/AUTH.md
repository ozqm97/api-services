# Autenticación

## Mecanismos presentes

1. **Laravel Sanctum**
    - Usado en rutas protegidas con `auth:sanctum`.
    - Se aplica a rutas `login/getUserInfo`, `login/logout`, `crm/ReservasOperador`, `crm/ObtenerReserva` y algunas rutas en `web.php`.

2. **JWT personalizado**
    - Implementado en `app/Traits/TokenManage.php` con `firebase/php-jwt`.
    - Genera tokens HS256 con `JWT_SECRET`.
    - Se valida en `LoginController` y varios controladores desde `validateToken($request->bearerToken())`.

3. **Middleware `check.bearer`**
    - Definido en `app/Http/Middleware/CheckBearerToken.php`.
    - Actualmente solo comprueba que exista el token, pero no lo valida.
    - Esto hace que algunas rutas estén expuestas con un falso control de acceso.

4. **Sesiones web**
    - `LoginController@loginContravel` usa `Auth::login($user)` y `session()->regenerate()`.
    - `Tablero\SessionController@logout` limpia cookies de sesión.

## Flujos de autenticación

### Contravel login (`/api/login/v1`)

- Valida credenciales contra un servicio SOAP externo (`agent.contravel.com.mx/AuthApi/Login`).
- Si la agencia es diferente de `100100` o `030004`, devuelve 403.
- Crea/actualiza `Contravel_user`, registra sesión en guard `web` y genera JWT.
- Actualmente retorna al cliente el usuario en lugar del token JWT.

### Agencies login (`/api/login/v2`)

- Valida credenciales contra el mismo servicio externo.
- Crea/actualiza `Cliente` y `Agencia`.
- Genera y devuelve token JWT.

### Renovación de token (`/api/login/renewToken`)

- Decodifica el bearer token actual.
- Genera uno nuevo con mismo `id`, `sub`, `uuid`.

### Obtener payload (`LoginController@getPayload`)

- Devuelve el payload JWT si el bearer token es válido.

## Riesgos e inconsistencias

- `CheckBearerToken` no valida la firma ni la expiración.
- `loginContravel` puede confundir el cliente porque no devuelve token JWT aunque lo genera.
- Se mezclan sesiones basadas en cookies con tokens bearer en el mismo dominio.
- `config/cors.php` permite orígenes y cabeceras `*` con `supports_credentials=true`, lo cual es muy inseguro en producción.
- No hay validación uniforme de autorización; `auth:sanctum` y `check.bearer` coexisten sin una política clara.

## Recomendaciones de gobernanza

- Consolidar a un único mecanismo de autenticación por API.
- Si se requiere autenticación basada en token, remplazar `check.bearer` con un middleware que valide JWT.
- Usar `auth:sanctum` exclusivamente para sesiones de navegador/cookie.
- Definir claramente cuáles rutas son públicas y cuáles necesitan token o sesión.
