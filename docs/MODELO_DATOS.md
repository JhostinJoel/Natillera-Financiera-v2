# Modelo de datos

## Participantes

Identidad y contacto de cada integrante. `active` permite desactivar sin perder historia.

## Contributions

Una fila por participante, año y mes. Guarda cuota debida, monto pagado y estado derivado.

## Loans

Guarda responsable, tipo (`PARTICIPANT` o `REFERRED`), capital, tasa, plazo, fecha, beneficiario y estado.

## LoanInstallment

Representa cada cuota del plan: vencimiento, capital, interés, total y valor pagado.

La restricción única de cuotas evita duplicar el mismo participante, año y mes.
