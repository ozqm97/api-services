# Performance

## Observaciones actuales

- Uso por defecto de `CACHE_STORE=database` y `QUEUE_CONNECTION=database`, lo cual es correcto para desarrollo pero puede ser un cuello de botella en producción.
- No hay uso explícito de `cache()` en el código revisado para resultados de consultas frecuentes.
- Las consultas en controladores como `PostHoteles`, `ResourceController` y `SessionController` pueden solicitar relaciones N+1 si no se optimizan correctamente.

## Posibles hotspots

- `Contravel_user::getFullPermissionTree()` carga roles y permisos en memoria para cada usuario.
- Consultas de reservas con `with(['plataforma', 'huesped', 'pagos', ...])` pueden traer grandes volúmenes de datos.
- `Broadcast::routes()` en `AppServiceProvider` puede agregar overhead si no se filtran correctamente las rutas de broadcast.

## Recomendaciones

- Introducir caché en consultas de catálogos y permisos.
- Reemplazar `database` cache/queue en producción por Redis o un backend dedicado.
- Usar paginación o límites en respuestas de colecciones grandes.
- Evitar `->get()` masivos sin criterios de paginación o fecha estricta.
- Monitorear latencia de las llamadas externas SOAP y ReCaptcha.
