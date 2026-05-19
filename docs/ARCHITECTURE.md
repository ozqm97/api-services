# Arquitectura del Proyecto

## Resumen general

Este repositorio es una API backend construida con Laravel 13 que funciona como un servicio de integración para plataformas de viajes, agencias y CRM interno.

Se identifican dominios principales:

- `login` / autenticación Contravel y agencias
- `operadora` / catálogo digital, paquetes, trenes, visas y ofertas
- `bitacora` / bitácora de servicios, notas, cargos, boletos y reportes
- `crm` / reservas de hoteles, autos y trenes, validaciones y mail
- `tablero` / sesión, permisos y roles
- `admin` / administración de agencias

## Capas y stack

- Backend: Laravel 13
- Entorno PHP: ^8.3
- Autenticación: Laravel Sanctum + JWT personalizado con `firebase/php-jwt`
- Frontend ligero: Vite / Tailwind / Laravel Echo
- Base de datos: múltiples conexiones MySQL y SQLite local
- Colas: driver `database` por defecto
- Broadcast: Reverb + Pusher-js compatible

## Módulos principales

- `app/Http/Controllers/` contiene controladores por dominio.
- `app/Models/` agrupa modelos por contexto: `tablero`, `contravel_bd`, `bitacora`, `comission`, `operadora`, `admon_op`, `hoteles`, `admin`.
- `routes/api.php` define la mayoría de los endpoints del servicio.
- `routes/web.php` incluye páginas web y algunas rutas duplicadas de autenticación y CRM.

## Dominio real

El sistema opera principalmente como un conector de servicios y orquestador de datos de reserva/operadora/bitácora, con lógica para:

- autenticar usuarios de agencias y Contravel
- consultar reservas y estados
- actualizar bitácoras, notas, cargos y boletos
- gestionar catálogos, proveedores y convenios
- emitir reportes y enviar correos

## Observaciones de estructura

- No existe un proyecto Next.js real en el repositorio. El front-end actual es un pipeline de assets de Laravel con Vite y Echo.
- Hay un patrón de múltiples bases de datos conectadas por modelo, lo que indica un sistema de integración federada de bases de datos.
- No hay un sistema de agentes IA presente hoy; se está creando ahora mediante documentación y memorias.
