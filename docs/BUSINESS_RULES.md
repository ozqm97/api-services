# Reglas de negocio

## Propósito del sistema

El proyecto actúa como una plataforma de integración que provee:

- Autenticación y sesión para usuarios de agencias y Contravel.
- Gestión de catálogos y ofertas para operadora.
- Registro y consulta de bitácoras, notas, cargos y boletos.
- Gestión de reservas de hoteles, autos, trenes y procesos de confirmación.
- Seguimiento de permisos y roles para el tablero administrativo.

## Reglas clave

### Login y autorización

- Solo agencias autorizadas (`100100` y `030004`) pueden iniciar sesión en el flujo Contravel.
- El servicio SOAP externo de `agent.contravel.com.mx/AuthApi/Login` es el origen de la verdad para credenciales.
- Existen dos caminos de login: `loginContravel` para Contravel y `loginAgencies` para agencias.

### Bitácora

- La bitácora incluye servicios, cargos, notas, tarjetas y boletos.
- Se espera que las operaciones de bitácora respondan en JSON con estructura de éxito/fracaso.
- Algunos endpoints requieren validación de token bearer; otros no aplican autorización clara.

### CRM / Reservas

- Las reservas se consultan por clave de reserva y pueden crear desgloses, observaciones y confirmaciones.
- Los estados de reserva pasan por ciclos de pago (`PAID`), confirmación y desgloses.
- El módulo CRM tiene operaciones de archivos y envío de correo.

### Catálogos y proveedores

- El módulo `operadora` maneja catálogos digitales, trenes, cruceros, visas y proveedores.
- Existen acciones de creación y actualización de proveedores y detalles de oferta.

### Permisos y roles

- `Contravel_user` carga roles y permisos usando tablas pivot (`user_roles`, `role_permissions`, `modules`, `permissions`, `areas`).
- La función `getFullPermissionTree()` construye una jerarquía de permisos por área, módulo y rol.

## Integraciones externas

- SOAP externo para autenticación de usuarios.
- `Reverb` para broadcasting de eventos.
- Servicios HTTP para validación ReCaptcha.
- Correo electrónico encolado con mailables que implementan `ShouldQueue`.

## Flujos no documentados

- Existen múltiples tablas conectadas a distintas bases de datos, lo que implica reglas de negocio distribuidas fuera de este repositorio.
- No todas las tablas clave (`contravel_users`, `servicios`, `reservas_aereas`, etc.) están definidas en migraciones del proyecto.
