# Project Context

Este repositorio es una API backend Laravel que actúa como integrador de servicios de viaje y CRM.

## Dominio y propósito

- Plataforma de autenticación y sesión para agencias y Contravel.
- Gestión de catálogos, reservas, bitácoras y permisos.
- Conexiones a múltiples bases de datos especializadas.
- Integración con servicios externos SOAP, ReCaptcha y broadcasting.

## Componentes principales

- `app/Http/Controllers/` — controladores de dominios.
- `app/Models/` — modelos Eloquent por dominio.
- `routes/api.php` — endpoints de API.
- `routes/web.php` — página web y rutas mixtas.
- `resources/js/` — cliente Axios y Echo para broadcast.
- `config/database.php` — múltiples conexiones MySQL y SQLite.

## Observaciones

- No existe un frontend React/Next.js completo.
- El repositorio mezcla autenticación de sesión y token.
- No hay documentación técnica ni memoria previa.
