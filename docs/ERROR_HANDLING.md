# Error Handling

## Estado actual

- No hay un manejo centralizado de errores en gran parte del código.
- Muchos controladores devuelven `response()->json()` directamente con estructuras diferentes.
- Se usa `ApiController` para respuestas estándar de éxito y error, pero no uniformemente.

## Inconsistencias detectadas

- Algunas respuestas de error tienen `errors` mientras que otras solo devuelven `message`.
- No hay una excepción global o `render()` customizada para normalizar errores.
- Varios controladores atrapan `ValidationException` y devuelven diferentes formatos.

## Recomendaciones

- Implementar un `App\Exceptions\Handler` uniforme o middleware para normalizar errores.
- Usar `FormRequest` para validación donde corresponda.
- Mantener la estructura `success/message/data` o `success/message/errors` consistentemente.
- Registrar excepciones críticas antes de devolver la respuesta.
