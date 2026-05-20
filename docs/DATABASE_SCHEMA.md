# Database Schema

## Multi-conexión definida

El proyecto define múltiples conexiones en `config/database.php`:

- `sqlite` — base local por defecto
- `mysql`, `mysql2`, `mysql3`, `mysql4`
- `mysql_comission`
- `mysql_admon_op`
- `mysql_hoteles`

Estas conexiones indican que el sistema integra distintos dominios de datos en bases separadas.

## Tablas clave reconocidas en el código

### Autenticación y permisos (`tablero`)

- `contravel_users`
- `user_roles`
- `role_permissions`
- `modules`
- `permissions`
- `areas`
- `roles`
- `users_permisos`
- `contravel_agencias`

### CRM y comisiones (`comission` y `hoteles`)

- `reservas_aereas`
- `catalogo_iata`
- `catalogo_aerolineas`
- `convenios_aereos`
- `reembolsos_especiales`
- `tbl_paquetes`
- `tbl_paises`
- `tbl_visa_contacto`
- `cata_prov_hoteles`
- `cata_prov_autos`
- `cata_prov_trenes`
- `in_desgloses`
- `in_desgloses_cars`
- `in_desgloses_trains`
- `post_reservas_confirmadas`
- `post_reservas_observaciones`

### Bitácora (`mysql3`)

- `tbl_boletos`
- `seguimiento_cargo`
- `cargos`
- `tbl_seguimientos`
- `tbl_notas`
- `servicios`
- `tbl_services_trenes`

### Otros dominios

- `tbl_agencias` (`mysql4`)
- `archivos` (`mysql_admon_op`)
- `comision_tpv` (`mysql_admon_op`)
- `admon_users` (`mysql_admon_op`)

## Migraciones presentes

Solo existen migraciones mínimas para:

- `role_permissions`
- `user_roles`

Esto sugiere que la mayoría del esquema está gestionado fuera del repositorio o que el proyecto depende de bases de datos existentes.

## Observaciones

- No hay migraciones para las tablas de dominios principales como `contravel_users`, `reservas_aereas`, `tbl_boletos`.
- El diseño real de la base de datos está parcialmente implicitado por los modelos de Eloquent.
- Varias tablas clave no están cubiertas por migraciones, lo que representa deuda técnica y riesgo de mantenimiento.
