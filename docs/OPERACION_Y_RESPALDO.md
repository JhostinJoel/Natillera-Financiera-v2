# Operación, respaldo y recuperación

## Respaldo recomendado

Realizar diariamente un `mysqldump` de la base `natillera`, conservar varias versiones y probar periódicamente la restauración en una base separada.

El respaldo debe protegerse con acceso restringido porque contiene información financiera y datos personales.

## Continuidad

- Registrar versión de código y fecha del cierre.
- No modificar reglas durante una campaña de cierre.
- Mantener la base en estado consistente.
- Verificar cuotas, préstamos y pagos antes de distribuir dinero.
- Documentar toda corrección manual.

## Incidentes

Ante un error de datos, detener modificaciones, conservar logs, respaldar la base y corregir mediante una operación trazable. No editar directamente el historial sin evidencia administrativa.
