<?php
include "../app/categoryController.php";

if(isset($_SESSION) == false || $_SESSION['id'] == false){
    header("Location:../");
}
$categoryController = new categoryController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto de Venta</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- -->
    <style>
        /* Estilos personalizados */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        #container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 70%;
            margin-left: 25%;
            align-items: center;
        }
        .mesa {
            width: 180px;
            height: 180px;
            border-radius: 15px;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }
        .mesa:hover {
            transform: scale(1.05);
        }
        .mesa h3 {
            margin: 0;
            color: #333;
        }
        .mesa p {
            margin: 5px 0;
            color: #666;
        }
    </style>
</head>
<body>

<div id="menu"></div>
<div id="container">
    <!-- Las tarjetas de las mesas se generarán dinámicamente aquí -->
</div>

<!-- jQuery y Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.1.0/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.1.0/firebase-database-compat.js"></script>
<script>
    var firebaseConfig = {
      apiKey: "AIzaSyAAmjsC5ZBySrrc8_FDHx6ZvOXAWm82bEY",
      authDomain: "frida-a5c24.firebaseapp.com",
      databaseURL: "https://frida-a5c24-default-rtdb.firebaseio.com",
      projectId: "frida-a5c24",
      storageBucket: "frida-a5c24.appspot.com",
      messagingSenderId: "760210327274",
      appId: "1:760210327274:web:a7d7dd23f7a6903a09b993"
    };

    // Inicializar Firebase
    firebase.initializeApp(firebaseConfig);

    // Referencia a tu base de datos en tiempo real
    const dbRef = firebase.database().ref("mesas");

    // Escuchar cambios en cada mesa y actualizar la interfaz
    dbRef.on('value', (snapshot) => {
      const mesas = snapshot.val();
      let mesasHTML = '';

      for (const key in mesas) {
        if (mesas.hasOwnProperty(key)) {
          const mesa = mesas[key];
          const estado = mesa.estado;
          const ocupantes = mesa.ocupantes ? mesa.ocupantes : 'Ninguno';

          mesasHTML += `
            <div class="mesa card text-center ${estado === 'ocupada' ? 'bg-danger' : 'bg-success'}">
              <div class="card-body">
                <h3 class="card-title">Mesa ${key}</h3>
                <p class="card-text">Estado: ${estado}</p>
                <p class="card-text">Ocupantes: ${ocupantes}</p>
              </div>
            </div>
          `;
        }
      }

      // Actualizar el contenedor de las mesas
      document.getElementById('container').innerHTML = mesasHTML;
    });

    // Escuchar cambios específicos en el nodo comandas
    dbRef.on('child_changed', (snapshot) => {
      const mesaId = snapshot.key;
      const comandas = snapshot.val().comandas;

      // Obtener la última comanda añadida
      const ultimaComanda = comandas[comandas.length - 1];
      console.log(`Última comanda añadida en la Mesa ${mesaId}:`, ultimaComanda);
    });

    $(document).ready(function() {
      // Cargar el menú lateral desde menu.php
      $("#menu").load("menu.php");
    });
</script>

</body>
</html>
