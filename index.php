<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dist/css/adminlte.css" />
  <title>Heladeria Marciv</title>
</head>

<body>
  <header class="bg-primary text-white text-center py-3">
    <div class="d-flex align-items-center justify-content-center gap-3 text-center">
      <span class="fs-1">🍦</span>
      <div>
        <h1 class="mb-0">Helados MARCIV</h1>
        <p class="mb-0">Armá tu pedido: Por cucurucho o por kilo</p>
      </div>

      <div class="header">
        <span class="carrito badge text-bg-warning fs-6" id="contadorCarrito" hidden>🛒 0 productos</span>
      </div>
    </div>
  </header>
  <form action="index3.php" method="POST">
    <main class="container-fluid px-4 py-4">
      <!-- Encabezado de la sección -->
      <div class="mb-4">

        <h3>Elegí tus sabores</h3>
        <p class="text-secondary">
          Tenemos 5 sabores disponibles. Pedí cada uno por cucurucho, por kilo, o combiná las dos opciones en el mismo sabor.
          El presupuesto se va actualizando solo, en guaraníes, mientras cargás.
        </p>
      </div>

      <!-- Contenedor principal -->
      <div class="row g-4">

        <!-- COLUMNA IZQUIERDA: Catálogo de productos (Ocupa 8 de 12 espacios en pantallas medianas/grandes) -->
        <div class="col-md-8">
          <div class="row g-3">

            <!-- Tarjeta de Producto 1 (Ocupa 4 de 12 espacios dentro de esta sub-fila, es decir, entran 3 productos por fila) -->
            <div class="col-md-4">
              <div class="card h-100 shadow-sm text-center p-3">
                <h5>Helados Pote 1/4</h5>
                <img src="imagenes/pote250.jpeg" style="height: 400px;">
                <p class="text-muted">Precio: 15.000 GS </p>

                <div class="pote250 row g-3 " style="justify-content: center;">

                  <div class="col-mb-3" style="width: auto;">
                    <label for="sabore" class="form-label">Primer Sabor</label><br />
                    <select class="" id="sabo1" name="sabo1" style="width: 100%; padding: 8px; margin-top: 5px; border-radius: 10px;">
                        <option value="" disabled selected>Seleccioná el sabor</option>
                        <option> Chocolate </option>
                      <option>Frutilla</option>
                      <option>Dulce de Leche</option>
                      <option>Vainilla</option>
                      <option>Granizado</option>
                    </select>
                  </div>

                  <div class="col-mb-3" style="width: auto;">
                    <label for="sabore" class="form-label">Segundo Sabor</label><br />
                    <select id="sabo2" name="sabo2" style="width: 100%; padding: 8px; margin-top: 5px; border-radius: 10px;">
                      <span>Segundo Sabor </span>
                      <option value="" disabled selected>Seleccioná el sabor</option>
                      <option> Chocolate </option>
                      <option>Frutilla</option>
                      <option>Dulce de Leche</option>
                      <option>Vainilla</option>
                      <option>Granizado</option>
                    </select>
                  </div>

                  <div class="d-flex align-items-center gap-2 mb-2">
                    <label class="form-label">Cucuruchos</label>
                    <div class="input-group rounded-pill border overflow-hidden" style="width: 150px;">

                      <button class="btn btn-outline-danger border-0 btn-restar" type="button">−</button>
                      <input type="text" inputmode="numeric" readonly class="form-control text-center cantidad-input" value="0" data-producto="Cucurucho" data-precio="2000">
                      <button class="btn btn-outline-success border-0 btn-sumar" type="button">+</button>

                    </div>

                  </div>
                  <button type="button" class="btn btn-outline-primary btn-sm w-100 btn-agregar" data-pote="Pote 1/4" data-precio-pote="15000">Agregar</button>
                </div>
              </div>
            </div>

            <!-- Tarjeta de Producto 2 -->
            <div class="col-md-4">
              <div class="card h-100 shadow-sm text-center p-3">
                <h5>Helados Pote 500GR</h5>
                <img src="imagenes/pote500.jpeg" style="height: 400px;">
                <p class="text-muted">Precio: 25.000 GS </p>

                <div class="pote250 row g-3 " style="justify-content: center;">

                  <div class="col-6">
                    <label for="sabore" class="form-label">Primer Sabor</label><br />
                    <select class="" id="sabo1" name="sabo1" style="width: 100%; padding: 8px; margin-top: 5px; border-radius: 10px;">
                      <option value="" disabled selected>Seleccioná el sabor</option>
                      <option> Chocolate </option>
                      <option>Frutilla</option>
                      <option>Dulce de Leche</option>
                      <option>Vainilla</option>
                      <option>Granizado</option>
                    </select>
                  </div>

                  <div class="col-6">
                    <label for="sabore" class="form-label">Segundo Sabor</label><br />
                    <select id="sabo2" name="sabo2" style="width: 100%; padding: 8px; margin-top: 5px; border-radius: 10px;">
                      <span>Segundo Sabor </span>
                      <option value="" disabled selected>Seleccioná el sabor</option>
                      <option> Chocolate </option>
                      <option>Frutilla</option>
                      <option>Dulce de Leche</option>
                      <option>Vainilla</option>
                      <option>Granizado</option>
                    </select>
                  </div>

                  <div class="col-6 mx-auto">
                    <label for="sabo3_500" class="form-label">Tercer Sabor</label><br />
                    <select id="sabo3_500" name="sabo3_500" style="width: 100%; padding: 8px; margin-top: 5px; border-radius: 10px;">
                      <option value="" disabled selected>Seleccioná el sabor</option>
                      <option> Chocolate </option>
                      <option>Frutilla</option>
                      <option>Dulce de Leche</option>
                      <option>Vainilla</option>
                      <option>Granizado</option>
                    </select>
                  </div>
                </div>
                <div class="mt-2">

                  <div class="d-flex align-items-center gap-2 mb-4">
                    <label class="form-label">Cucuruchos</label>
                    <div class="input-group rounded-pill border overflow-hidden" style="width: 150px;">

                      <button class="btn btn-outline-danger border-0 btn-restar" type="button">−</button>
                      <input type="text" inputmode="numeric" readonly class="form-control text-center cantidad-input" value="0" data-producto="Cucurucho" data-precio="2000">
                      <button class="btn btn-outline-success border-0 btn-sumar" type="button">+</button>

                    </div>

                  </div>
                  <button style="margin:8px;" type="button" class="btn btn-outline-primary btn-sm w-100 btn-agregar" data-pote="Pote 1/5" data-precio-pote="25000" >Agregar</button>
                </div>
              </div>
            </div>

            <!-- Tarjeta de Producto 3 -->
            <div class="col-md-4">
              <div class="card h-100 shadow-sm text-center p-3">
                <h5>Helados Pote 1KG</h5>
                <img src="imagenes/Pote1000.jpeg" style="height: 400px;">
                <p class="text-muted">Precio: 45.000 GS </p>

                <div class="pote250 row g-3 " style="justify-content: center;">

                  <div class="col-6">
                    <label for="sabore" class="form-label">Primer Sabor</label><br />
                    <select class="" id="sabo1" name="sabo1" style="width: 100%; padding: 8px; margin-top: 5px; border-radius: 10px;">
                      <option value="" disabled selected>Seleccioná el sabor</option>
                      <option> Chocolate </option>
                      <option>Frutilla</option>
                      <option>Dulce de Leche</option>
                      <option>Vainilla</option>
                      <option>Granizado</option>
                    </select>
                  </div>

                  <div class="col-6">
                    <label for="sabore" class="form-label">Segundo Sabor</label><br />
                    <select id="sabo2" name="sabo2" style="width: 100%; padding: 8px; margin-top: 5px; border-radius: 10px;">
                      <span>Segundo Sabor </span>
                      <option value="" disabled selected>Seleccioná el sabor</option>
                      <option> Chocolate </option>
                      <option>Frutilla</option>
                      <option>Dulce de Leche</option>
                      <option>Vainilla</option>
                      <option>Granizado</option>
                    </select>
                  </div>

                  <div class="col-6">
                    <label for="sabo3_1000" class="form-label">Tercer Sabor</label><br />
                    <select id="sabo3_1000" name="sabo3_1000" style="width: 100%; padding: 8px; margin-top: 5px; border-radius: 10px;">
                      <option value="" disabled selected>Seleccioná el sabor</option>
                      <option> Chocolate </option>
                      <option>Frutilla</option>
                      <option>Dulce de Leche</option>
                      <option>Vainilla</option>
                      <option>Granizado</option>
                    </select>
                  </div>

                  <div class="col-6">
                    <label for="sabo4_1000" class="form-label">Cuarto Sabor</label><br />
                    <select id="sabo4_1000" name="sabo4_1000" style="width: 100%; padding: 8px; margin-top: 5px; border-radius: 10px;">
                      <option value="" disabled selected>Seleccioná el sabor</option>
                      <option> Chocolate </option>
                      <option>Frutilla</option>
                      <option>Dulce de Leche</option>
                      <option>Vainilla</option>
                      <option>Granizado</option>
                    </select>
                  </div>
                </div>
                <div class="mt-2">

                  <div class="d-flex align-items-center gap-2 mb-4">
                    <label class="form-label">Cucuruchos</label>
                    <div class="input-group rounded-pill border overflow-hidden" style="width: 150px;">

                      <button class="btn btn-outline-danger border-0 btn-restar" type="button">−</button>
                      <input type="text" inputmode="numeric" readonly class="form-control text-center cantidad-input" value="0" data-producto="Cucurucho" data-precio="2000">
                      <button class="btn btn-outline-success border-0 btn-sumar" type="button">+</button>

                    </div>

                  </div>
                  <button style="margin: 8px;" type="button" class="btn btn-outline-primary btn-sm w-100 btn-agregar" data-pote="Pote 1 kg" data-precio-pote="45000">Agregar</button>
                </div>

              </div>
            </div>

          </div>
        </div>

        <!-- COLUMNA DERECHA: Aside / Resumen (Ocupa 4 de 12 espacios) -->
        <aside class="col-md-4 barra-lateral" aria-label="Información del presupuesto">
          <div class="card shadow-sm p-3 position-sticky" style="top: 20px;">
            <h4 class="card-title">Resumen del Presupuesto</h4>
            <hr>
            <div id="resumen">
              <p class="text-muted" id="resumenVacio">No has seleccionado ningún producto.</p>
              <div id="resumenDetalle"></div>
              <div class="d-flex justify-content-between font-weight-bold fs-5 mt-3">
                <span>Total:</span>
                <span id="totalPedido">Gs. 0</span>
              </div>
              <button type="submit" class="btn btn-success w-100 mt-3" id="btnVerPedido" disabled>
                Confirmar Pedido
              </button>
              <p class="text-muted small mt-2 mb-0" id="avisoBtn">
                Cargá al menos una cantidad para continuar.
              </p>
            </div>
          </div>
          <br><br>
          <section class="info-card" id="como-funciona">
            <h3>Cómo hacer tu pedido</h3>
            <ol class="pasos">
              <li><span class="paso-num"></span><span>Elegí sabores y cantidades desde el catálogo.</span></li>
              <li><span class="paso-num"></span><span>Cargá tus datos de factura y entrega.</span></li>
              <li><span class="paso-num"></span><span>Confirmá y recibí tu helado fresquito.</span></li>
            </ol>
          </section>

          <section class="info-card">
            <h3>Horarios, envíos y pagos</h3>
            <ul class="info-lista">
              <li><span>🕒</span> Lun a Sáb, de 10:00 a 21:00</li>
              <li><span>🛵</span> Envíos en Asunción y alrededores</li>
              <li><span>💳</span> Efectivo, transferencia y tarjetas</li>
              <li><span>📞</span> (021) 123-456 · helados@heladospy.com</li>
            </ul>
          </section>
        </aside>
      </div>
    </main>
    <!-- CAMPOS OCULTOS: se llenan solos con el pedido y se envían al index3.php -->
    <div id="camposOcultos" hidden></div>
  </form>
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

  <script>
    const formPedido = document.querySelector('form[action="index3.php"]');
    const inputsCantidad = [...formPedido.querySelectorAll('.cantidad-input')];
    const resumenVacio = document.getElementById('resumenVacio');
    const resumenDetalle = document.getElementById('resumenDetalle');
    const totalPedido = document.getElementById('totalPedido');
    const btnVerPedido = document.getElementById('btnVerPedido');
    const avisoBtn = document.getElementById('avisoBtn');
    const contadorCarrito = document.getElementById('contadorCarrito');
    const camposOcultos = document.getElementById('camposOcultos');
    const carrito = {};

    function formatoGs(valor) {
      return 'Gs. ' + Math.round(valor).toLocaleString('es-PY');
    }

    // Arma la lista de productos con cantidad > 0
    function calcularPedido() {
      return Object.entries(carrito)
        .filter(([clave, item]) => item.cantidad > 0)
        .map(([clave, item]) => ({
          ...item,
          clave
        }));
    }

    function renderizarPedido() {
      const items = calcularPedido();
      const unidades = items.reduce((acc, item) => acc + item.cantidad, 0);
      const total = items.reduce((acc, item) => acc + item.cantidad * item.precio, 0);

      // Resumen del aside
      resumenVacio.hidden = items.length > 0;
      resumenDetalle.innerHTML = items.map(item => `
                    <div class="d-flex justify-content-between border-bottom py-1">
                        <span>${item.cantidad} x ${item.producto}</span>
                        <span>${formatoGs(item.cantidad * item.precio)}</span>
                        <button type="button" class="btn btn-sm btn-link text-danger p-0 ms-2 btn-quitar" data-clave="${item.clave}">✕</button>
                    </div>
                `).join('');
      totalPedido.textContent = formatoGs(total);

      // Botón + contador del header
      const hayPedido = unidades > 0;
      btnVerPedido.disabled = !hayPedido;
      contadorCarrito.hidden = !hayPedido;
      contadorCarrito.textContent = '🛒 ' + unidades + (unidades === 1 ? ' producto' : ' productos');
      avisoBtn.textContent = hayPedido ?
        'Al continuar vas a cargar los datos de factura y entrega.' :
        'Cargá al menos una cantidad para continuar.';

      // Lo que viaja al index3.php por POST
      camposOcultos.innerHTML =
        items.map(item => `
                        <input type="hidden" name="producto[]" value="${item.producto}">
                        <input type="hidden" name="sabor[]" value="${item.sabor}">
                        <input type="hidden" name="cantidad[]" value="${item.cantidad}">
                        <input type="hidden" name="precio[]" value="${item.precio}">
                        <input type="hidden" name="subtotal[]" value="${item.cantidad * item.precio}">
                    `).join('') +
        `<input type="hidden" name="total_unidades" value="${unidades}">
                     <input type="hidden" name="total_venta" value="${total}">`;
    }

    inputsCantidad.forEach(input => {
      input.addEventListener('input', renderizarPedido);
      input.addEventListener('change', renderizarPedido);
    });

    // Por si el pedido cambió justo antes de enviar
    formPedido.addEventListener('submit', renderizarPedido);


    renderizarPedido();


    document.querySelectorAll('.btn-restar').forEach(btn => {
      btn.addEventListener('click', () => {
        const input = btn.parentElement.querySelector('.cantidad-input');
        input.value = Math.max(0, (parseInt(input.value, 10) || 0) - 1);
      });
    });
    document.querySelectorAll('.btn-sumar').forEach(btn => {
      btn.addEventListener('click', () => {
        const input = btn.parentElement.querySelector('.cantidad-input');
        input.value = (parseInt(input.value, 10) || 0) + 1;
      });
    });

    resumenDetalle.addEventListener('click', (e) => {
      const btn = e.target.closest('.btn-quitar');
      if (!btn) return;
      delete carrito[btn.dataset.clave];
      renderizarPedido();
    });

    document.querySelectorAll('.btn-agregar').forEach(btn => {
      btn.addEventListener('click', () => {
        const card = btn.closest('.card');
        const input = card.querySelector('.cantidad-input');
        const conos = Math.max(0, parseInt(input.value, 10) || 0);
        const selects = [...card.querySelectorAll('select')];
        const elegidos = selects.filter(st => st.value);
        selects.forEach(st => st.classList.remove('is-invalid'));

        if (elegidos.length === selects.length && selects.length > 0) {
          // Pote completo (+ cucuruchos si hay)
          const sabores = elegidos.map(st => st.value).join(' + ');
          const pote = btn.dataset.pote;
          const precioPote = Number(btn.dataset.precioPote);
          const clavePote = pote + '|' + sabores;
          if (!carrito[clavePote]) {
            carrito[clavePote] = { producto: pote, sabor: sabores, cantidad: 0, precio: precioPote };
          }
          carrito[clavePote].cantidad += 1;
          if (conos > 0) {
            if (!carrito['Cucurucho|']) {
              carrito['Cucurucho|'] = { producto: 'Cucurucho', sabor: '—', cantidad: 0, precio: Number(input.dataset.precio) };
            }
            carrito['Cucurucho|'].cantidad += conos;
          }
          input.value = 0;
          selects.forEach(st => st.selectedIndex = 0);
          renderizarPedido();
        } else if (conos > 0) {
          // Solo cucuruchos (te olvidaste: los suma sin otro pote)
          if (!carrito['Cucurucho|']) {
            carrito['Cucurucho|'] = { producto: 'Cucurucho', sabor: '—', cantidad: 0, precio: Number(input.dataset.precio) };
          }
          carrito['Cucurucho|'].cantidad += conos;
          input.value = 0;
          renderizarPedido();
        } else {
          // No hay nada para agregar
          selects.forEach(st => { if (!st.value) st.classList.add('is-invalid'); });
          alert('Cargá los sabores del pote o al menos un cucurucho');
        }
      });
    })
    
  </script>
</body>

</html>