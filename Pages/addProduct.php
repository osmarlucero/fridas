<?php
    include "../app/categoryController.php";
//    $categoryController = new categoryController();
  //  $insumos = $categoryController->getVentas();
    //$cantidades = $categoryController->getStats();
   
    if(isset($_SESSION)==false  || $_SESSION['id']==false){
        header("Location:../");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Añadir Articulo</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Estilos personalizados */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f8f9fa;
    }
    #container {
      margin-left: 20%;
      margin-top: 50px;
    }
    .form-container {
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    }
    .form-title {
      text-align: center;
      margin-bottom: 30px;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>
</head>
<body>
<div id="menu"></div>
<div id="container">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="form-container">
          <h2 class="form-title">Añadir Artículo</h2>
          <form action="../app/categoryController.php" method="post">
            <div class="form-group">
              <label for="nombreProducto">Nombre Producto:</label>
              <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" required>
            </div>
            <div class="form-group">
              <label for="familia">Familia:</label>
              <input type="text" class="form-control" id="familia" name="familia">
            </div>
            <div class="form-group">
              <label for="grupo">Grupo:</label>
              <input type="text" class="form-control" id="grupo" name="grupo">
            </div>
            <div class="form-group">
              <label for="subgrupo">Subgrupo:</label>
              <input type="text" class="form-control" id="subgrupo" name="subgrupo">
            </div>
            <div class="form-group">
              <label for="precio">Precio:</label>
              <input type="number" class="form-control" id="precio" name="precio" required>
            </div>
            <div class="form-group">
              <label for="costo">Costo:</label>
              <input type="number" class="form-control" id="costo" name="costo" required>
            </div>
            <div class="form-group">
              <label for="stock">Stock:</label>
              <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
            <div class="form-group">
              <label for="almacen">Almacén:</label>
              <select class="form-control" id="almacen" name="almacen" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </div>
            <div class="form-group">
              <label for="codigo">Código:</label>
              <input type="text" class="form-control" id="codigo" name="codigo" readonly>
              <input type="hidden" name="action" value="storeProduct">
            </div>
            <button type="button" class="btn btn-primary" onclick="generarCodigo()">Generar Código</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    // Cargar el contenido del menú
    $("#menu").load("menu.php");
  });

  function generarCodigo() {
    // Función para generar un código aleatorio de 6 caracteres alfanuméricos
    var codigo = '';
    var caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    var longitud = 6;
    for (var i = 0; i < longitud; i++) {
      codigo += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    document.getElementById('codigo').value = codigo;
  }
</script>
</body>
</html>
