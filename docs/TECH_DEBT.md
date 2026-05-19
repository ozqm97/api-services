# Tech Debt

## Deuda técnica principal

- Ausencia de migraciones para la mayoría de las tablas del dominio.
- Lógica de autenticación incompleta y fragmentada.
- Configuraciones de CORS y broadcast inseguras.
- Dependencia de múltiples conexiones de base de datos sin una capa de abstracción clara.
- Controladores que mezclan validación, negocio, persistencia y respuesta.
- Falta de políticas o gates de autorización centralizados.
- Uso de `env()` directamente en lógica de token y servicios.

## Deuda de arquitectura

- No hay un sistema definido de modularización de rutas.
- No hay servicios o repositorios para desacoplar acceso a datos.
- No existe documentación de arquitectura ni decisiones técnicas previas.

## Deuda operativa

- No hay monitoreo o métricas definidas.
- El queue driver por defecto es `database` y puede escalar mal.
- No existe una estrategia de fallback para fallos de broadcast o SOAP.

## Prioridades

1. Corregir la validación JWT y el middleware de seguridad.
2. Definir una estrategia de autorización clara.
3. Consolidar rutas y endpoint API.
4. Añadir migraciones para tablas críticas.
5. Establecer un sistema de documentación viva con `/docs` y `/memory`.
