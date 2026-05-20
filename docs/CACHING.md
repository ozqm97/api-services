# Caching

## Configuración actual

- `CACHE_STORE=database` por defecto.
- La configuración de `config/cache.php` define `database`, `file`, `memcached`, `redis`, `dynamodb`, `octane`.
- No hay uso explícito de cache en el código fuente revisado.

## Recomendaciones

- Para producción, cambiar a Redis o Memcached en lugar de base de datos.
- Cachear resultados de catálogos y consultas de permisos frecuentes.
- Usar TTL razonables para datos de catálogos y listas de recursos.
- Evitar cachear información altamente sensible sin control de acceso.
