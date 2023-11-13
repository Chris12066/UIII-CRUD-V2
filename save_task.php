<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $anio = $_POST['anio'];
  $color = $_POST['color'];
  $tipo = $_POST['tipo'];
  $cilindros = $_POST['cilindros'];
  $precio = $_POST['precio'];
  $query = "INSERT INTO carro(marca, modelo, anio, color, tipo, cilindros, precio) VALUES ('$marca', '$modelo', '$anio', '$color', '$tipo', '$cilindros', '$precio')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Carro guardado correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
