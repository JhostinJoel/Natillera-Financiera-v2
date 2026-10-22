# Estrategia de pruebas

Las pruebas unitarias verifican:

- Amortización con interés mensual.
- Conservación del capital al finalizar el plan.
- Préstamo sin interés.
- Abono de `$50.000` sobre cuota de `$100.000`.
- Segundo abono que completa la cuota.
- Tasa del 5% para participante.
- Bloqueo del segundo préstamo activo del participante.
- Tasa del 10% y datos obligatorios del referido.

Ejecutar:

```powershell
\.venv\Scripts\python.exe -m pytest -q
```

Antes de publicar cambios se debe ejecutar compilación, pruebas y verificación manual de las pantallas principales.
