# API

## Endpoints principales

### Prefijo `/recaptcha`

- `POST /api/recaptcha/validate-recaptcha-v2` — Validar reCAPTCHA v2
- `POST /api/recaptcha/validate-recaptcha` — Validar reCAPTCHA v3

### Prefijo `/login`

- `POST /api/login/v1` — Autenticación Contravel
- `POST /api/login/v2` — Autenticación Agencias
- `GET /api/login/renewToken` — Renovar JWT (requiere `check.bearer`)
- `GET /api/login/getUserInfo` — Obtener usuario con `auth:sanctum`
- `POST /api/login/logout` — Cerrar sesión con `auth:sanctum`
- `GET /api/login/getDataUser` — Obtener datos mediante `check.bearer`

### Prefijo `/operadora`

- `POST /api/operadora/sso_login` — SSO para operadora
- `GET /api/operadora/getDataUser` — Obtener datos de usuario (JWT bearer)
- `GET /api/operadora/getServer` — Obtener host del servidor
- `GET /api/operadora/getAgencyUser` — Obtener agencia de usuario (JWT bearer)
- `POST /api/operadora/updateStatus` — Actualizar estado de oferta
- `GET /api/operadora/getLastestOffers` — Obtener ofertas más recientes
- `GET /api/operadora/getCatalogDigital` — Obtener catálogo digital
- `GET /api/operadora/getCircuit` — Obtener circuitos
- `POST /api/operadora/getByRegion` — Obtener por región
- `POST /api/operadora/getCountries` — Obtener países
- `POST /api/operadora/getByCountry` — Obtener por país
- `GET /api/operadora/getCruises` — Obtener cruceros
- `GET /api/operadora/getTrains` — Obtener trenes
- `GET /api/operadora/getVisa` — Obtener visas
- `POST /api/operadora/sendMailVisa` — Enviar solicitud de visa
- `POST /api/operadora/getDetails` — Obtener detalles de oferta
- `POST /api/operadora/sendMailOffer` — Enviar oferta por correo
- `GET /api/operadora/download` — Descarga de recurso

### Prefijo `/bitacora`

- Varios endpoints para bitácora de servicios, tarjetas, notas, boletos, cargos, permisos y reportes.
- `GET /api/bitacora/getServices` — Obtener servicios (JWT bearer)
- `GET /api/bitacora/getUser` — Obtener usuario (JWT bearer)
- `POST /api/bitacora/updateStatus` — Actualizar estatus
- `POST /api/bitacora/updateCargo` — Actualizar cargo
- `POST /api/bitacora/saveTarjeta` — Guardar tarjeta
- `POST /api/bitacora/saveNota` — Guardar nota
- `POST /api/bitacora/saveDataBitacora` — Guardar datos de bitácora
- `POST /api/bitacora/saveBoletos` — Guardar boletos
- `POST /api/bitacora/saveBoleto` — Guardar boleto individual
- `POST /api/bitacora/obtenerTarjeta` — Obtener tarjeta
- `POST /api/bitacora/obtenerNotas` — Obtener notas
- `POST /api/bitacora/obtenerEstatus` — Obtener estatus
- `POST /api/bitacora/obtenerCargoByServicio` — Obtener cargo por servicio
- `POST /api/bitacora/obtenerBoletos` — Obtener boletos
- `GET /api/bitacora/generaReporte` — Generar reporte
- `POST /api/bitacora/eliminarBoleto` — Eliminar boleto
- `GET /api/bitacora/obtenerTipoPago` — Obtener tipos de pago
- `GET /api/bitacora/obtenerServicios` — Obtener servicios
- `GET /api/bitacora/obtenerPermisos` — Obtener permisos
- `GET /api/bitacora/obtenerCargos` — Obtener cargos
- `GET /api/bitacora/obtenerBitacoras` — Obtener bitácoras
- `GET /api/bitacora/obtenerAgencias` — Obtener agencias

### Prefijo `/crm`

- `POST /api/crm/ObtenerComisionesAutos`
- `POST /api/crm/upAutos`
- `GET /api/crm/obtenerProvCars`
- `POST /api/crm/upProveedorAutos`
- `GET /api/crm/obtenerProveedoresTrenes`
- `POST /api/crm/upProveedorTrenes`
- `POST /api/crm/upTrenes`
- `POST /api/crm/CancelReserv`
- `POST /api/crm/MandarObs`
- `GET /api/crm/reportConsult`
- `POST /api/crm/upHoteles`
- `POST /api/crm/upProveedor`
- `GET /api/crm/obtenerProveedores`
- `POST /api/crm/ReservasPagadas`
- `GET /api/crm/ReservasOperador` (auth:sanctum)
- `POST /api/crm/ObtenerReserva` (auth:sanctum)
- `POST /api/crm/ConsultarReserva`
- `POST /api/crm/ConfirmarReserva`
- `POST /api/crm/InsertConfir`
- `POST /api/crm/ConsultReser`
- `POST /api/crm/login`
- `POST /api/crm/logout`
- `GET /api/crm/obtenerUsers`
- `GET /api/crm/obtenerPermisos`
- `POST /api/crm/UpdatePermisos`
- `POST /api/crm/enviarCorreo`
- `POST /api/crm/upload`
- `POST /api/crm/uploadPDF`
- `POST /api/crm/ConsultAgencias`
- `POST /api/crm/ConsultCargosTPV`
- `GET /api/crm/reembolsos-especiales`
- `POST /api/crm/reembolsos-especiales`
- `PUT /api/crm/reembolsos-especiales/{id}`
- `GET /api/crm/proveedores-excepciones`
- `POST /api/crm/proveedores-excepciones`
- `PUT /api/crm/proveedores-excepciones/{id}`
- `DELETE /api/crm/proveedores-excepciones/{id}`
- `POST /api/crm/comisiones/upload-temp`
- `GET /api/crm/comisiones/temp/{id}`
- `PUT /api/crm/comisiones/temp/{id}`
- `DELETE /api/crm/comisiones/temp/{tempId}`
- `GET /api/crm/convenios-aereos`
- `POST /api/crm/convenios-aereos`
- `PATCH /api/crm/convenios-aereos/{id}`
- `DELETE /api/crm/convenios-aereos/{id}`
- `PUT /api/crm/convenios-aereos/reordenar`
- `GET /api/crm/catalogo-aerolineas`
- `POST /api/crm/catalogo-aerolineas`
- `PUT /api/crm/catalogo-aerolineas/{id}`
- `DELETE /api/crm/catalogo-aerolineas/{id}`
- `GET /api/crm/reservas-aereas`
- `POST /api/crm/reservas-aereas`
- `PUT /api/crm/reservas-aereas/{id}`
- `DELETE /api/crm/reservas-aereas/{id}`
- `GET /api/crm/catalogo-iata`
- `GET /api/crm/catalogo-iata/{code}`
- `GET /api/crm/catalogo-iata-search`
