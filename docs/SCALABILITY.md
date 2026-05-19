# Scalability

## Estado actual

- El proyecto es principalmente backend Laravel con múltiples conexiones a bases de datos.
- No hay microservicios reales, sino un backend monolítico con dominios separados por carpetas y conexiones.
- El servidor de colas está configurado para `database`, lo cual es funcional pero limitado a escala.

## Factores de escalabilidad

### Positivos

- Uso de bases de datos separadas indica separación de dominios de datos.
- Arquitectura de controladores por dominio (`operadora`, `bitacora`, `crm`, `tablero`).
- Uso de `ShouldQueue` en mailables y broadcast para offload de tareas.

### Limitaciones

- El monolito está fuertemente acoplado con lógica de negocio espagueti en controladores.
- No hay un bus de eventos centralizado ni colas dedicadas para cada dominio.
- La configuración de caché y queue está orientada a desarrollo (`database`).

## Recomendaciones

- Adoptar Redis para cache y cola en producción.
- Introducir un service layer para desacoplar controladores de persistencia.
- Evaluar separación de servicios por dominio: `auth`, `crm`, `bitacora`, `operadora`.
- Implementar paginación y límites de consulta en endpoints de colección.
- Usar un esquema de API versionado para permitir evolución.
