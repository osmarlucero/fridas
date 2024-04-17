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
  <title>Punto de Venta</title>
  <style>
    /* Estilos personalizados */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    #container {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      padding: 20px;
      margin-left: 30%;
    }
    #menu {
      width: 13%;
      background-color: #f8f9fa;
      position: fixed;
      height: 100%;
    }
    #carrito {
      flex: 1;
      background-color: #f8f9fa;
      padding: 10px;
    }
    .producto {
      cursor: pointer;
      margin-bottom: 10px;
      padding: 10px;
      background-color: #e9ecef;
      border-radius: 5px;
    }
    .eliminar {
      color: red;
      cursor: pointer;
    }
  </style>
</head>
<body>

<div id="menu"></div>

<div id="container">
  <div id="carrito">
    <h2>Carrito</h2>
    <ul id="lista-carrito"></ul>
    <p>Total: <span id="total">0</span></p>
  </div>

<div>
  <input type="text" id="productoInput" placeholder="Nombre del producto">
  <button id="checkButton">Check</button>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  // Cargar el menú lateral desde menu.php
  $("#menu").load("menu.php");

  const listaCarrito = $("#lista-carrito");
  const totalElemento = $("#total");

  $("#checkButton").click(function() {
    const productoInput = $("#productoInput").val();

    // Realizar la solicitud AJAX
    $.ajax({
      type: "POST",
      url: "../app/categoryController.php",
      data: { action: "product", id: productoInput },
      success: function(response) {
        const producto = JSON.parse(response);
        if (producto !== null) {
          const nombre = producto[0].nombre;
          const precioTexto = producto[0].precio;
          const precio = parseFloat(precioTexto);
          const id = producto[0].idArticulo;

          const productoEnCarrito = $(`#lista-carrito li[data-id="${id}"]`);
          if (productoEnCarrito.length > 0) {
            const cantidad = parseInt(productoEnCarrito.find('.cantidad').text()) + 1;
            productoEnCarrito.find('.cantidad').text(cantidad);
          } else {
            const li = $(`<li data-id="${id}">${nombre} (ID: ${id}) - $${precioTexto} <span class="cantidad">1</span> <span class="eliminar">Eliminar</span></li>`);
            listaCarrito.append(li);
          }

          let total = parseFloat(totalElemento.text());
          total += precio;
          totalElemento.text(total.toFixed(2));
        } else {
          console.log("No se encontró el producto");
        }
      }
    });
  });

  $("#lista-carrito").on("click", ".eliminar", function() {
    const li = $(this).parent();
    const cantidadActual = parseInt(li.find('.cantidad').text());
    const precioTexto = li.text().match(/\$[\d.]+/);
    const precio = parseFloat(precioTexto[0].substring(1));
    let total = parseFloat(totalElemento.text());

    let cantidadEliminar = cantidadActual;
    if (cantidadActual > 1) {
      cantidadEliminar = prompt(`¿Cuántos productos deseas eliminar? (Máx. ${cantidadActual})`);
      cantidadEliminar = parseInt(cantidadEliminar);
      if (!cantidadEliminar || cantidadEliminar <= 0 || cantidadEliminar > cantidadActual) {
        return;
      }
    }

    const nuevaCantidad = cantidadActual - cantidadEliminar;
    if (nuevaCantidad <= 0) {
      total -= precio * cantidadActual;
      totalElemento.text(total.toFixed(2));
      li.remove();
    } else {
      $(this).prev().text(nuevaCantidad);
      total -= precio * cantidadEliminar;
      totalElemento.text(total.toFixed(2));
    }
  });
});
</script>

</body>
</html>
