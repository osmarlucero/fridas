<?php

if (isset($_SESSION) == false || $_SESSION['id'] == false) {
    header("Location:../");
}
include "../app/categoryController.php";
$categoryController = new categoryController();
$insumos = $categoryController->getProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        #container {
            margin-top: 20px;
            margin-left: 20%;
        }

        th, td {
            text-align: center;
        }
    </style>
</head>
<body>
  <div id="menu"></div>
<div class="container">
    <div class="row">
        <div class="col-md-3" id="menu"></div>
        <div class="col-md-9" id="container">
            <h4 class="mb-3">Inventario</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="col-2">ID</th>
                        <th class="col-5">Nombre</th>
                        <th class="col-3">Stock</th>
                        <th class="col-2">Precio</th>
                    </tr>
                    </thead>
                    <tbody class="item-list">
                    <!-- Ejemplo de productos -->
                    <?php foreach ($insumos as $insumo): ?>
                        <tr>
                            <td><?= $insumo['idArticulo'] ?></td>
                            <td><?= $insumo['nombre'] ?></td>
                            <td><?= $insumo['stock'] ?></td>
                            <td>$<?= $insumo['precio'] ?></td>
                        </tr>
                    <?php endforeach ?>
                    <?php foreach ($insumos as $insumo): ?>
                        <tr>
                            <td><?= $insumo['idArticulo'] ?></td>
                            <td><?= $insumo['nombre'] ?></td>
                            <td><?= $insumo['stock'] ?></td>
                            <td>$<?= $insumo['precio'] ?></td>
                        </tr>
                    <?php endforeach ?>
                    <?php foreach ($insumos as $insumo): ?>
                        <tr>
                            <td><?= $insumo['idArticulo'] ?></td>
                            <td><?= $insumo['nombre'] ?></td>
                            <td><?= $insumo['stock'] ?></td>
                            <td>$<?= $insumo['precio'] ?></td>
                        </tr>
                    <?php endforeach ?>
                    <?php foreach ($insumos as $insumo): ?>
                        <tr>
                            <td><?= $insumo['idArticulo'] ?></td>
                            <td><?= $insumo['nombre'] ?></td>
                            <td><?= $insumo['stock'] ?></td>
                            <td>$<?= $insumo['precio'] ?></td>
                        </tr>
                    <?php endforeach ?>
                    <?php foreach ($insumos as $insumo): ?>
                        <tr>
                            <td><?= $insumo['idArticulo'] ?></td>
                            <td><?= $insumo['nombre'] ?></td>
                            <td><?= $insumo['stock'] ?></td>
                            <td>$<?= $insumo['precio'] ?></td>
                        </tr>
                    <?php endforeach ?>
                    <?php foreach ($insumos as $insumo): ?>
                        <tr>
                            <td><?= $insumo['idArticulo'] ?></td>
                            <td><?= $insumo['nombre'] ?></td>
                            <td><?= $insumo['stock'] ?></td>
                            <td>$<?= $insumo['precio'] ?></td>
                        </tr>
                    <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Paginación -->
<div class="container mt-3">
    <ul id="pagination" class="pagination justify-content-center"></ul>
</div>

<!-- jQuery y JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        // Cargar el contenido del menú
        $("#menu").load("menu.php");
        
        const itemsPerPage = 15;
        const itemList = document.querySelector('.item-list');
        const paginationContainer = document.getElementById('pagination');

        const totalItems = itemList.children.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage);

        // Generar botones de paginación
        for (let i = 1; i <= totalPages; i++) {
            const pageButton = document.createElement('li');
            pageButton.classList.add('page-item');
            pageButton.innerHTML = `<a class="page-link" href="#">${i}</a>`;
            
            pageButton.addEventListener('click', function (e) {
                e.preventDefault();
                showPage(i);
            });
            
            paginationContainer.appendChild(pageButton);
        }

        // Función para mostrar la página seleccionada
        function showPage(pageNumber) {
            const startIndex = (pageNumber - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;

            for (let i = 0; i < totalItems; i++) {
                if (i >= startIndex && i < endIndex) {
                    itemList.children[i].style.display = 'table-row';
                } else {
                    itemList.children[i].style.display = 'none';
                }
            }
        }

        // Mostrar la primera página al cargar la página
        showPage(1);
    });
</script>
</body>
</html>
