# Decisiones de diseño

## Desactivar en lugar de borrar

La eliminación física de un participante con historial puede romper la trazabilidad. Por eso se conserva el registro y se utiliza `active=false`.

## No editar préstamos pagados

Un plan pagado representa una operación cerrada. Editarlo alteraría intereses y reportes históricos, por lo que permanece bloqueado.

## Tasas por tipo

La tasa no se acepta libremente desde el formulario: el backend fija 5% para participante y 10% para referido. Esto evita que la interfaz modifique reglas financieras.

## Datos demo identificados

Los datos de prueba utilizan documentos `DEMO-2026-*` para impedir confundir simulaciones con información real.
