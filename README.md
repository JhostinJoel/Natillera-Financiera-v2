# Natillera Financiera V2

Migración PHP 8.2+ y MySQL/TiDB de la aplicación original Flask. La interfaz reutiliza los recursos visuales, PWA, responsive, animaciones y SweetAlert2 de la V1.

## Requisitos

- PHP 8.2 o superior con `pdo_mysql`.
- MySQL 8+ o TiDB.
- Servidor web apuntando a `public/`.

## Instalación

1. Copiar `.env.example` a `.env` y configurar la conexión.
2. Ejecutar `database/schema.sql`.
3. Servir con `php -S localhost:8080 -t public`.
4. Ejecutar pruebas: `php tests/run.php`.

## Reglas financieras

Los préstamos propios aplican 5% fijo mensual sobre el capital inicial; los referidos aplican 10%. El capital amortizado se divide en cuotas constantes, ajustando únicamente la última cuota por redondeo. Los pagos se aplican primero a intereses y luego a capital. Un préstamo solo se marca pagado cuando todas sus cuotas están cubiertas.

La V2 se desarrolla paralelamente a la V1 para comparar resultados antes de migrar producción.
