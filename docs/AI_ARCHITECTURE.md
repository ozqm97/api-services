# AI Architecture

## Estado actual

- No existe una arquitectura IA definida en el repositorio.
- No hay memoria IA, prompts, embeddings, herramientas o agentes de ejecución.
- El frontend no tiene componentes de IA.

## Objetivo de la futura arquitectura IA

- Crear un sistema multiagente que apoye la gobernanza, la documentación viva y la evolución segura.
- Mantener al mismo tiempo el backend Laravel como fuente de verdad.
- Introducir agentes especializados que colaboren y se auditen entre sí.

## Componentes propuestos

- `orchestrator` — coordinador principal.
- `architect` — revisión de modularidad y refactorización.
- `frontend-guardian` — revisa UI/UX y frontend de assets.
- `backend-guardian` — revisa seguridad, API y arquitectura backend.
- `ai-engineer` — responsable de prompts, embeddings y RAG.
- `security-auditor` — audita OWASP, JWT, permisos y hardening.
- `performance-auditor` — audita performance de consultas y render.
- `scalability-reviewer` — audita crecimiento y readiness para microservicios.
- `anti-pattern-detector` — identifica deuda técnica y malas prácticas.
- `refactor-agent` — ejecuta refactorizaciones seguras incrementales.
- `documentation-agent` — mantiene los documentos sincronizados con el código.
- `external-reviewer` — provee feedback independiente y detecta sesgos.

## Gobernanza

- Todo agente debe escribir decisiones en `/memory`.
- Las decisiones deben persistir y evitar contradicciones.
- El `external-reviewer` tiene autoridad para cuestionar y simplificar.
- La documentación debe reflejar el estado real del proyecto.

## Futuro inmediato

1. Registrar el contexto del proyecto y las decisiones actuales en memoria.
2. Definir un proceso de auditoría colaborativo entre agentes.
3. Mantener los cambios no destructivos, basados en análisis real.
4. Construir un roadmap de refactorización incremental.
