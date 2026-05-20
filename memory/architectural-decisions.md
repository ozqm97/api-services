# Architectural Decisions

## Estado inicial

- Mantener la arquitectura Laravel monolítica existente.
- Introducir documentación viva antes de cambiar la arquitectura.
- Mantener compatibilidad con rutas y modelos actuales.
- Documentar los límites de cada dominio y las conexiones de base de datos.

## Decisiones para la evolución

- Crear un sistema multiagente de documentación y gobernanza.
- Usar agentes especializados para seguridad, rendimiento y escalabilidad.
- Registrar cada decisión técnica en `/memory`.
- No inventar módulos adicionales ni asumir flujos inexistentes.
