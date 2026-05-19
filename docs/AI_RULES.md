# Reglas de IA

## Estado actual

- No existe actualmente ninguna integración de IA nativa en el repositorio.
- No hay prompts, memoria IA, embeddings ni workflows de RAG definidos en el código.
- Tampoco hay archivos de agentes ni documentación específica de IA.

## Principios de gobernanza IA

1. Basar todas las decisiones en el análisis real del repositorio.
2. No inventar módulos adicionales que no existan en el código o en la arquitectura actual.
3. Mantener compatibilidad con el sistema existente.
4. Dar prioridad a la seguridad y a la claridad sobre la sofisticación.
5. Registrar decisiones, restricciones y patrones aprobados en memoria persistente.
6. Evitar sobreingeniería en las primeras etapas.
7. Utilizar agentes especializados para auditar, documentar y revisar.

## Reglas de interacción futura

- Cualquier nuevo agente IA debe ser documentado en `/agents`.
- Las decisiones de IA deben persistir en `/memory`.
- La documentación debe describir la arquitectura real, no una arquitectura teórica.
- Los flujos de IA deben ser incrementalmente seguros y no deben romper las APIs existentes.

## Uso previsto

- Soporte a decisiones técnicas.
- Auditoría de seguridad y calidad.
- RAG con documentación viva.
- Asistencia de refactorización y evolución segura.

## Restricciones

- No se deben añadir prompts o agentes que dependan de credenciales secretas en el repositorio.
- No se debe asumir la existencia de un frontend Next.js o de un servicio de IA existente.
- Si falta información, debe registrarse como incertidumbre en la memoria.
