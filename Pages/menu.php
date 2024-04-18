<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú Sidebar</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Estilos personalizados */
    body {
      padding-top: 56px;
    }
    .sidebar {
      position: fixed;
      width: 15%;
      top: 0;
      left: 0;
      bottom: 0;
      z-index: 1000;
      padding: 48px 0;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
      background-color: #038587;
      color: white;
    }
    .sidebar-nav {
      padding-left: 20px;
      list-style: none;
    }
    .sidebar-nav .nav-link {
      padding: 10px 20px;
      color: white;
    }
    .sidebar-nav .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }
    .main-content {
      margin-left: 250px;
      padding: 20px;
    }
  </style>
</head>
<body>

<div class="sidebar">
  <ul class="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link" href="main.php">Inicio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="addTable.php">Añadir Mesa</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="stock.php">Menu</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Usuarios</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Sucursales</a>
    </li>
  </ul>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
