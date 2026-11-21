<?php
$host = 'localhost';
$port = '5432';
$db = 'marciv';
$user = 'postgres';
$pass = 'TU_CONTRASEÑA';

try {
  $conn = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
} catch (PDOException $e) {
  die("Error de conexión: " . $e->getMessage());
}
