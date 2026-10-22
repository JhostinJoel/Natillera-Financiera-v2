# Endpoints principales

| Método | Ruta | Propósito |
|---|---|---|
| GET | `/` | Panel de cuotas |
| POST | `/participants` | Crear participante |
| GET | `/participants` | Consultar y filtrar participantes |
| POST | `/participants/<id>/update` | Actualizar participante |
| POST | `/participants/<id>/deactivate` | Desactivar participante |
| POST | `/participants/<id>/reactivate` | Reactivar participante |
| POST | `/participants/<id>/delete` | Eliminar solo sin historial |
| GET | `/loans` | Panel unificado de préstamos |
| POST | `/loans` | Crear préstamo |
| POST | `/loans/<id>/update` | Actualizar préstamo activo sin pagos |
| POST | `/loans/<id>/cancel` | Cancelar conservando historial |
| GET | `/loans/<id>` | Ver plan de pagos |
| GET | `/reports/annual` | Reporte anual detallado |
| GET | `/financial-close` | Cierre financiero |
