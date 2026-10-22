# Migración de paridad V1 → V2

La V1 permanece intacta. La V2 se valida módulo por módulo contra la V1.

## Criterio de paridad

- [ ] Navegación y layout responsive.
- [ ] Ahorros: filtros, cuotas enero–noviembre, abonos, completar, reiniciar, modal y contactos.
- [ ] Participantes: listado, búsqueda, filtro de estado, alta, edición, activación, desactivación y eliminación protegida.
- [ ] Préstamos: filtros, alta, validaciones, propio 5%, referido 10%, plan de pagos, pagos totales y parciales, cancelación y regeneración controlada.
- [ ] Reportes: cierre anual, intereses efectivamente cobrados, distribución igualitaria y totales trazables.
- [ ] PWA: manifest, service worker, instalación móvil y assets visuales.
- [ ] Pruebas unitarias, integración, rutas y comparación de resultados financieros.

## Regla de aceptación

La V2 no se considerará equivalente hasta que cada cálculo y estado financiero relevante produzca el mismo resultado que la V1 para el mismo conjunto de datos.
