# Observability

## Estado actual

- La aplicación usa logging estándar de Laravel (`stack`, `single`, `daily`).
- Hay logs de depuración en controladores críticos (`LoginController`, `PostHoteles`, `SesionController`).
- No hay métricas, trazas distribuidas o health checks definidos.

## Puntos de observabilidad

- `storage/logs/laravel.log` es la fuente principal de diagnóstico.
- Las rutas de broadcast y eventos pueden ser supervisadas mediante logs de Reverb/Pusher.
- No se observa un sistema de alertas o dashboard integrado.

## Recomendaciones

- Agregar logs estructurados y niveles adecuados (`info`, `warning`, `error`).
- Introducir health checks para base de datos, cache y broadcast.
- Instrumentar latencias de las llamadas SOAP externas y ReCaptcha.
- Considerar un APM o sistema de métricas para seguimiento de performance.
