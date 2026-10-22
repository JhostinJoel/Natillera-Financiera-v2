# Comparación página a página V1/V2

La comparación se ejecuta con la V1 en `http://127.0.0.1:5000` y la V2 en `http://127.0.0.1:8080`, usando la misma base de datos.

| Página | V1 | V2 | Criterio de igualdad |
|---|---|---|---|
| Ahorros `/` | referencia | en migración | mismos 11 meses, estados, abonos, reinicio, filtros y contactos |
| Participantes `/participants` | referencia | en migración | mismo CRUD, filtros, activación y protección de historial |
| Préstamos `/loans` | referencia | en migración | mismas tasas, validaciones, estados y filtros |
| Plan `/loans/{id}` | referencia | pendiente de paridad | mismo plan, interés fijo, capital, pagos y totales |
| Reportes `/reports/annual` | referencia | en migración | mismos intereses cobrados y distribución |

No se declara paridad completa hasta validar cada fila, estado, cálculo y acción en ambas versiones.
