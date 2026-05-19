# Queue System

## Configuración actual

- `QUEUE_CONNECTION=database` por defecto.
- El `package.json` define un comando `dev` que arranca `php artisan queue:listen --tries=1 --timeout=0`.
- Mailables como `App\Mail\EnviarCorreo`, `InfoPaqueteMail` y `VisaSolicitudMail` implementan `ShouldQueue`.

## Observaciones

- Se usa el driver de base de datos para queues, lo que puede escalar mal con muchas tareas.
- No se detectan jobs individuales ni listeners explícitos en el código fuente revisado.
- El proyecto asume un worker en ejecución en desarrollo.

## Recomendaciones

- Evaluar Redis o un servicio de cola gestionada en producción.
- Definir jobs específicos para tareas de correo y procesamiento de reservas.
- Asegurar que los workers no procesen tareas no idempotentes varias veces sin retry controlado.
- Configurar tablas `jobs` y `failed_jobs` en migraciones de despliegue.
