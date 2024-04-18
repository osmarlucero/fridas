<?php
    include "../app/categoryController.php";

    if(isset($_SESSION)==false  || $_SESSION['id']==false){
        header("Location:../");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Añadir Mesa</title>
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
          <h2 class="form-title">Añadir Mesa</h2>
          <form action="../app/categoryController.php" method="post">
            <div class="form-group">
              <label for="id">ID:</label>
              <input type="text" class="form-control" id="id" name="id" >
            </div>
            <div class="form-group">
              <label for="cantidadPersonas">Cantidad de Personas:</label>
              <input type="number" class="form-control" id="cantidadPersonas" name="cantidadPersonas" required>
            </div>
            <div class="form-group">
              <label for="ubicacion">Ubicación:</label>
              <select class="form-control" id="ubicacion" name="ubicacion" required>
                <option value="piso">Piso</option>
                <option value="exterior">Exterior</option>
                <option value="terraza">Terraza</option>
              </select>
            </div>
            <input type="hidden" name="action" value="storeMesa">
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
</script>
</body>
</html>
