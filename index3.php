<?php
// ===== PEDIDO QUE MANDA index.php POR POST =====
$productos = (array) ($_POST['producto'] ?? []);
$sabores = (array) ($_POST['sabor'] ?? []);
$cantidades = (array) ($_POST['cantidad'] ?? []);
$subtotales = (array) ($_POST['subtotal'] ?? []);
$totalVenta = (float) ($_POST['total_venta'] ?? 0);

$lineasPedido = [];
foreach ($productos as $i => $nombre) {
  $cantidad = (int) ($cantidades[$i] ?? 0);
  if ($cantidad <= 0) {
    continue;
  }
  $lineasPedido[] = [
    'producto' => $nombre,
    'sabor' => $sabores[$i] ?? 'Clasico',
    'cantidad' => $cantidad,
    'subtotal' => (float) ($subtotales[$i] ?? 0),
  ];
}

function formatoGs($valor)
{
  return 'Gs. ' . number_format((float) $valor, 0, ',', '.');
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="dist/css/adminlte.css" />

  <title>Helados Marciv</title>
</head>

<body>
  <header class="bg-primary text-white text-center">
    <div class="d-flex align-items-center justify-content-center gap-3 text-center">
      <span class="fs-1">🍦</span>
      <div>
        <h1 class="mb-0">Helados MARCIV</h1>
        <p class="mb-3">Armá tu pedido: Por cucurucho o por kilo</p>
      </div>

      <div class="header">
        <span class="carrito badge text-bg-warning fs-6" id="contadorCarrito" hidden>🛒 0 productos</span>
      </div>
    </div>
  </header>
  <main class="container" style="width: 45%">
    <div>
      <?php if (!empty($lineasPedido)): ?>
        <div class="card mb-3">
          <div class="card-header">
            <h3 class="card-title">Tu pedido</h3>
          </div>
          <div class="card-body">
            <?php foreach ($lineasPedido as $linea): ?>
              <span><?= htmlspecialchars($linea['producto']) ?> (<?= htmlspecialchars($linea['sabor']) ?>)</span>
              <div class="d-flex justify-content-between border-bottom py-1">
                <span><?= htmlspecialchars($linea['producto']) ?></span>
                <span><?= $linea['cantidad'] ?> x <?= formatoGs($linea['subtotal'] / max(1, $linea['cantidad'])) ?></span>
                <span><?= formatoGs($linea['subtotal']) ?></span>
              </div>
            <?php endforeach; ?>
            <div class="d-flex justify-content-between fw-bold fs-5 mt-3">
              <span>Total:</span>
              <span><?= formatoGs($totalVenta) ?></span>
            </div>
          </div>
        </div>
      <?php else: ?>
        <div class="alert alert-warning">
          No hay productos en el pedido. Volvé al presupuesto y cargá las cantidades.
        </div>
      <?php endif; ?>
    </div>
    <section
      class="container"
      id="datos-clientes2">
      <div class="card" id="db">

      </div>
      <div class="datos-card2 card">
        <div class="card-header">
          <h3 class="card-title">Datos para la facturacion y Entrega</h3>
        </div>
        <div class="card-body">
          <p>Necesitamos estos datos para emitir tu factura y coordinar la entrega de los productos. </p>
          <form id="form-clientes">

            <!-- CAMBIO AGREGADO: Selector del Tipo de Documento para cumplir con DNIT -->
            
            <div class="campo">
              <label for="pago" class="form-label">Metodo de Pago</label><br />
              <select id="pago" name="pago" required style="width: 35%; padding: 8px; margin-top: 5px; border-radius: 4px;" required>
                <option value="Efectivo">Efectivo</option>                
                <option value="Tarjeta">Tarjetar o Qr</option>
              </select>
            </div>

            <div class="campo">
              <label for="tipo_doc">Tipo de Comprobante</label><br />
              <select id="tipo_doc" name="tipo_doc" style="width: 35%; padding: 8px; margin-top: 5px; border-radius: 4px;" required>
                <option value="CI">Cédula de Identidad</option>
                <option value="RUC">RUC</option>
              </select>
            </div>

            <div class="Ruc mb-3">
              <label for="ci" class="orm-label">Numero de Ruc o Identidad</label><br />
              <input
                type="text"
                id="ci"
                name="ci"
                class="form-control" style=" width: 35%;"
                placeholder="Ej: 80081132-1 o 5574555" />
              <span class="error1" id="errorci"></span>
            </div>


            <div class="NombApell mb-3">
              <label for="nombre2" class="form-label"> Ingrese su Nombre y Apellido </label>
              <input
                type="text"
                id="nombre2"
                name="nombre2"
                class="form-control" style=" width: 35%;"
                placeholder="Ej: Ivan Castelaho"
                required />
              <span class="error1" id="errorNombre"></span>
            </div>

            <div class="telf mb-3">
              <label for="telef" class="form-label">Numero de Telefono</label><br />
              <input
                type="text"
                id="telef"
                name="telef"
                class="form-control" style=" width: 35%;"
                placeholder="Ej: 0971664492"
                required />
              <span class="error1" id="errortelef"></span>
            </div>

            <div class="dire mb-3 ">
              <label for="direc" class="form-label">Direccion de Entrega</label><br />
              <input
                type="text"
                id="direc"
                name="direc"
                class="form-control" style=" width: 50%;"
                placeholder="Calle, Numero, Referencia"
                required />
              <span class="error" id="errordirec"></span>
            </div>
            <div class="row">
              <div class="campo dos-columnas col-md-5 mb-1">
                <label for="ciu" class="form-label">Ciudad</label>
                <input
                  type="text"
                  id="ciu"
                  name="ciu"
                  class="form-control" style=" width: 200px;"
                  placeholder="Ej: Asunción"
                  required />
                <span class="error" id="errorciu"></span>
              </div>
              <div class="col-md-4 mb-2" style="justify-content:space-between;"  >
                <label for="email" class="form-label">Correo Electrónico</label>
                <input
                  type="email"
                  id="email"
                  name="email"
                  class="form-control" style=" width: 200px;"
                  placeholder="tu@gmail.com"
                  required />
                <span class="error" id="erroremail"></span>
              </div>
            </div>

            <div class="mb-3">
              <label for="notas" class="form-label">Nota para la Entrega (Opcional)</label>
              <textarea
                id="notas"
                name="notas"
                class="form-control"
                style="width:100%;"
                rows="3"
                placeholder="Ej: Otra direccion, Entregar a las 16:00 horas, Porton azul, etc."></textarea>
            </div>
            <div class="form-botones">

              <a href="index.php" class="btn btn-danger text-decoration-none" id="btnvolver">Volver al presupuesto</a>

              <button type="submit" class="btn btn-success">
                Confirmar Pedido
              </button>
            </div>
          </form>
        </div>
    </section>

    <section
      class="confirmacion1"
      id="confirmacion1"
      hidden aria-label="">
      <div class="card-body text-center">
        <div class="card">

          <p class="text-success" >
            Guardá o hacé una captura de esta pantalla como comprobante. Nos
            pondremos en contacto para coordinar la entrega y la factura.
          </p>
          <div class="card" id="detalleConfirmacion"></div>
          

          <div class="alert alert-success">✅ Pedido Confirmado</div>
            <a href="index.php" class="btn btn-warning text-decoration-none text-black" id="btnvolver">Hacer un Nuevo Pedido</a>
        </div>
      </div>
    </section>
  </main>
  <footer class="bg-primary text-white text-center">
    <div class="row justify-content-center">
      <div class="col-md-4 mb-3 py-4">
        <h4>🍦 Helados MARCIV</h4>
        <p>
          Helados artesanales por cucurucho y por kilo, preparados con leche y
          frutas seleccionadas.
        </p>
      </div>
      <div class="col-md-4 mb-3 py-4">
        <h4>Contacto</h4>
        <span>📍 Ingavi / Sgto. V. Gonzalez </span>
        <span>📞 (021 123 456) </span>
        <span>✉️ @marciv@gmail.com </span>
      </div>
    </div>
    <div class="wrap">
      <p class="footer-legal">
        Helados PY · Precios en guaraníes (Gs.) a modo de referencia ·
        Asunción, Paraguay
      </p>
    </div>
  </footer>

  <!-- SCRIPT AGREGADO: Control dinámico del formulario y envío de datos -->
  <script>
    const formClientes = document.getElementById('form-clientes');
    const tipoDocSelect = document.getElementById('tipo_doc');
    const inputCi = document.getElementById('ci');

    // El número de documento siempre es obligatorio (CI o RUC)
    tipoDocSelect.addEventListener('change', () => {
      inputCi.required = true;
      inputCi.placeholder = "Ej: 80081132-1 o 5574555";
    });

    formClientes.addEventListener('submit', function(e) {
      e.preventDefault();

      // Total real del carrito (enviado por index.php)
      const totalVentaCarrito = <?= json_encode($totalVenta) ?>;

      // Empaquetamos los datos del formulario
      const formData = new FormData(formClientes);
      formData.append('total_venta', totalVentaCarrito);

      // Envío por AJAX a tu backend en PHP
      fetch('procesar_venta.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.text())
        .then(data => {
          // Ocultamos la sección de datos y mostramos la confirmación
          document.getElementById('datos-clientes2').hidden = true;
          document.getElementById('confirmacion1').hidden = false;
          document.getElementById('detalleConfirmacion').innerHTML = data;
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Ocurrió un error al procesar tu helado.');
        });
    });
  </script>
</body>

</html>