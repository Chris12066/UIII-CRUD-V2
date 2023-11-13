<?php
include("db.php");
$marca = '';
$modelo = '';
$anio = '';
$color = '';
$tipo = '';
$cilindros = '';
$precio = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM carro WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $marca = $row['marca'];
    $modelo = $row['modelo'];
    $anio = $row['anio'];
    $color = $row['color'];
    $tipo = $row['tipo'];
    $cilindros = $row['cilindros'];
    $precio = $row['precio'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $anio = $_POST['anio'];
  $color = $_POST['color'];
  $tipo = $_POST['tipo'];
  $cilindros = $_POST['cilindros'];
  $precio = $_POST['precio'];

  $query = "UPDATE carro set marca = '$marca', modelo = '$modelo', anio = '$anio', color = '$color', tipo = '$tipo', cilindros = '$cilindros', precio = '$precio' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Se ha editado con exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="marca" type="text" class="form-control" value="<?php echo $marca; ?>" placeholder="Actualizar Marca">
        </div>
        <div class="form-group">
          <input name="modelo" type="text" class="form-control" value="<?php echo $modelo; ?>" placeholder="Actualizar Modelo">
        </div>
        <div class="form-group">
          <input name="anio" type="text" class="form-control" value="<?php echo $anio; ?>" placeholder="Actualizar Año">
        </div>
        <div class="form-group">
          <input name="color" type="text" class="form-control" value="<?php echo $color; ?>" placeholder="Actualizar Color">
        </div>
        <div class="form-group">
          <input name="tipo" type="text" class="form-control" value="<?php echo $tipo; ?>" placeholder="Actualizar Tipo">
        </div>
        <div class="form-group">
          <input name="cilindros" type="text" class="form-control" value="<?php echo $cilindros; ?>" placeholder="Actualizar Cilindros">
        </div>
        <div class="form-group">
          <input name="precio" type="text" class="form-control" value="<?php echo $precio; ?>" placeholder="Actualizar Precio">
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
