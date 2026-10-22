# Arquitectura y construcción del proyecto

## Lenguaje y tecnologías

El proyecto fue desarrollado en **Python 3.12** con **Flask 3.1**. Flask gestiona las rutas HTTP, el ciclo de solicitudes y la renderización de las páginas. La persistencia utiliza **MySQL 8.4** y SQLAlchemy como ORM; PyMySQL conecta Python con MySQL.

La interfaz utiliza HTML5, plantillas Jinja2 y CSS responsive. SweetAlert2 presenta confirmaciones y notificaciones visuales. pytest verifica las reglas financieras.

El sistema usa Flask con una separación MVC ligera:

- `models.py`: entidades SQLAlchemy.
- `routes.py`: controladores HTTP.
- `templates/`: vistas Jinja2.
- `services.py`: reglas financieras y amortización.
- `tests/`: pruebas unitarias.

## Estructura de carpetas

```text
app.py             fábrica y arranque Flask
config.py          configuración y variables de entorno
extensions.py      instancia SQLAlchemy
models.py          modelos de datos
routes.py          controladores y endpoints
services.py        reglas financieras y cálculos
templates/         vistas HTML/Jinja2
static/            estilos y recursos frontend
tests/             pruebas automatizadas
scripts/           utilidades, incluyendo datos demo
docs/              documentación técnica y operativa
```

Entidades: `Participant`, `Contribution`, `Loan` y `LoanInstallment`.

## Funcionamiento técnico

1. El usuario abre una pantalla en el navegador.
2. Flask recibe la ruta y valida los datos.
3. El controlador consulta o actualiza MySQL mediante SQLAlchemy.
4. `services.py` calcula abonos, tasas, amortización o cierre.
5. La vista devuelve la información actualizada y SweetAlert2 comunica el resultado.

Las operaciones destructivas se reducen: participantes con historial se desactivan y préstamos pagados no se editan ni cancelan.

El flujo principal es: participante → cuota → ahorro; participante o referido → préstamo → plan de pagos → intereses; intereses consolidados → distribución igualitaria.
