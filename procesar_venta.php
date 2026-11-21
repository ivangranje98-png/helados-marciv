<?php
require_once 'conexion.php';

$productos = (array) ($_POST['producto'] ?? []);
$cantidades = (array) ($_POST['cantidad'] ?? []);
$sabores = (array) ($_POST['sabor'] ?? []);
$subtotales = (array) ($_POST['subtotal'] ?? []);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $total_venta = floatval($_POST['total_venta']);
  $factura_tipo_doc = $_POST['tipo_doc'];

  $limite_sin_factura = 351231;

  if ($factura_tipo_doc === 'CASUAL' && $total_venta >= $limite_sin_factura) {
    die("Error Fiscal: DNIT exige identificación obligatoria para compras mayores o iguales a Gs. 351.231.");
  }

  if ($factura_tipo_doc === 'CASUAL') {
    $cliente_id = 1;
    $factura_nombre = 'SIN NOMBRE';
    $factura_documento = '4444440';
    $factura_dv = 1;
  } else {
    $cliente_id = 1;
    $factura_nombre = $_POST['nombre2'];

    $raw_doc = $_POST['ci'];
    if (strpos($raw_doc, '-') !== false) {
      $parts = explode('-', $raw_doc);
      $factura_documento = preg_replace('/[^0-9]/', '', $parts[0]);
      $factura_dv = intval($parts[1]);
    } else {
      $factura_documento = preg_replace('/[^0-9]/', '', $raw_doc);
      $factura_dv = null;
    }
  }

  $sucursal_id = 1;
  $usuario_id = 1;

  $envio_nombre = $_POST['nombre2'];
  $envio_telefono = $_POST['telef'];
  $envio_direccion = $_POST['direc'] . " - Ciudad: " . $_POST['ciu'];
  $envio_referencia = !empty($_POST['notas']) ? $_POST['notas'] : null;

  try {
    $sql = "INSERT INTO ventas (
                    sucursal_id, usuario_id, cliente_id, factura_nombre, 
                    factura_tipo_doc, factura_documento, factura_dv, total_venta,
                    envio_nombre, envio_telefono, envio_direccion, envio_referencia
                ) VALUES (
                    :sucursal_id, :usuario_id, :cliente_id, :factura_nombre, 
                    :factura_tipo_doc, :factura_documento, :factura_dv, :total_venta,
                    :envio_nombre, :envio_telefono, :envio_direccion, :envio_referencia
                )";

    // Cambiado $pdo por $conn para que coincida con tu conexion.php
    $stmt = $conn->prepare($sql);
    $stmt->execute([
      ':sucursal_id' => $sucursal_id,
      ':usuario_id' => $usuario_id,
      ':cliente_id' => $cliente_id,
      ':factura_nombre' => $factura_nombre,
      ':factura_tipo_doc' => $factura_tipo_doc,
      ':factura_documento' => $factura_documento,
      ':factura_dv' => $factura_dv,
      ':total_venta' => $total_venta,
      ':envio_nombre' => $envio_nombre,
      ':envio_telefono' => $envio_telefono,
      ':envio_direccion' => $envio_direccion,
      ':envio_referencia' => $envio_referencia
    ]);

    $metodo_pago = $_POST['pago'] ?? 'Efectivo';
    echo "<p><strong>Teléfono:</strong> " . htmlspecialchars($envio_telefono) . "</p>";
    echo "<p><strong>Método de pago:</strong> " . htmlspecialchars($metodo_pago) . "</p>";

    echo "<p><strong>Cliente:</strong> " . htmlspecialchars($envio_nombre) . "</p>";
    echo "<p><strong>Dirección de entrega:</strong> " . htmlspecialchars($envio_direccion) . "</p>";
    foreach ($productos as $i => $nombre) {
      echo "<p><strong>" . htmlspecialchars($nombre) . " (" . htmlspecialchars($sabores[$i] ?? '') . ")</strong> x " . (int)$cantidades[$i] . " — Gs. " . number_format($subtotales[$i], 0, ',', '.') . "</p>";
    }
    echo "<p><strong>Comentarios:</strong> " . htmlspecialchars($_POST['notas'] ?? '—') . "</p>";
    echo "<p><strong>Monto total facturado:</strong> Gs. " . number_format($total_venta, 0, ',', '.') . "</p>";
  } catch (PDOException $e) {
    echo "Error crítico en el servidor al guardar el registro.";
  }
}
