# Anti-Patterns

## Anti-patrones detectados

### 1. Mezcla de responsabilidades en controladores

- Los controladores manejan validación, lógica de negocio, consultas a múltiples bases de datos y respuesta JSON sin separación clara.

### 2. Middleware de seguridad incompleto

- `CheckBearerToken` permite avanzar si existe cualquier bearer token.
- Esto es un patrón de seguridad roto.

### 3. Rutas duplicadas

- Existen rutas similares en `routes/api.php` y `routes/web.php`.
- Esto causa mantenimiento más difícil y comportamientos inconsistentes.

### 4. Dependencia de servicios externos en los controladores

- El login depende directamente de una llamada SOAP dentro de `LoginController`, lo cual acopla lógica de negocio a un servicio externo.

### 5. Uso inconsistente de autenticación

- Se mezclan `auth:sanctum`, `check.bearer`, sesión `web` y JWT sin un patrón claro.

### 6. Migraciones incompletas

- Se usan muchas tablas que no tienen migraciones definidas en el repositorio.

### 7. CORS abierto en producción

- `allowed_origins: ['*']` con credenciales activadas.

### 8. Broadcasting sin autorización adecuada

- Canal `user.{user}` retorna `true` siempre.

## Consecuencias

- Deuda técnica creciente.
- Mayor riesgo de fugas de seguridad.
- Dificultad para escalar y refactorizar.
- Comportamiento impredecible entre desarrollos locales y producción.
