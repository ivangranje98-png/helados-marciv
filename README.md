# Helados MARCIV 🍦
Sistema de pedidos para una heladería, hecho en PHP y PostgreSQL.
Es mi primer proyecto: lo subo para mostrar lo que sé y para seguir mejorándolo.

## Qué hace
- Catálogo de potes con selección de sabores y cucuruchos
- Resumen del presupuesto en tiempo real, en guaraníes
- Formulario de facturación (CI/RUC) y datos de entrega
- Guarda la venta en PostgreSQL con sentencias preparadas (PDO)

## Tecnologías
PHP, PostgreSQL, JavaScript, HTML/CSS, Bootstrap (AdminLTE)

## Cómo probarlo
1. Crear la base de datos `marciv` en PostgreSQL
2. Copiar `conexion.example.php` como `conexion.php` y poner tus datos
3. Abrir `localhost/Trabajo_Practico/index.php`

## Pendiente (próximos pasos)
- Guardar el detalle de cada compra (tablas `productos` y `detalle_venta`)
- Calcular el total en el servidor, no en el navegador
- Validar todos los datos del formulario en el servidor
- Panel para ver y gestionar las ventas
