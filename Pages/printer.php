<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Generar XML y Mostrar en Tabla</title>
<!-- Incluir la biblioteca CryptoJS para cifrar contraseñas en MD5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
</head>
<body>

<!-- Tabla para mostrar el XML -->
<table id="tablaUsuarios">
  <thead>
    <tr>
      <th>Usuario</th>
      <th>Contraseña</th>
    </tr>

  </thead>
  <tbody>
    <!-- Aquí se insertarán las filas de la tabla -->
  </tbody>
</table>

<!-- Script para generar el XML y mostrar en la tabla -->
<script>
// Datos de usuarios y contraseñas
var usuarios = [
    {
        "usuario": "CO0612A",
        "contraseña": "I))bgw1"
    },
    {
        "usuario": "CO0621B",
        "contraseña": "G41skc^R"
    },
    {
        "usuario": "CO0079A",
        "contraseña": "PQ_vlf0A"
    },
    {
        "usuario": "CO0079B",
        "contraseña": "NP3key39"
    },
    {
        "usuario": "CO0079C",
        "contraseña": "FK3npgW4"
    },
    {
        "usuario": "EK5429A",
        "contraseña": "?f1sçrI4"
    },
    {
        "usuario": "EK5429B",
        "contraseña": "625qptT."
    },
    {
        "usuario": "EK5429C",
        "contraseña": "3JXfcb4;"
    },
    {
        "usuario": "TMT188A",
        "contraseña": "0M0gxh:1"
    },
    {
        "usuario": "BH0317A",
        "contraseña": "E38ij~;1"
    },
    {
        "usuario": "BH0362A",
        "contraseña": "(U1tkiH)"
    },
    {
        "usuario": "BH0419A",
        "contraseña": "VD7vzq3I"
    }
];

// Función para cifrar la contraseña en MD5 y agregar "Hola" al final
function cifrarContraseña(contraseña) {
    return CryptoJS.MD5(contraseña + "Hola").toString();
}

// Función para generar el XML y mostrar en la tabla
function generarXMLyMostrarTabla() {
    var tablaUsuarios = document.getElementById("tablaUsuarios");
    var tbody = tablaUsuarios.getElementsByTagName("tbody")[0];
    
    usuarios.forEach(function(usuario) {
        var fila = tbody.insertRow();
        var celdaUsuario = fila.insertCell(0);
        var celdaContraseña = fila.insertCell(1);
        celdaUsuario.textContent = usuario.usuario;
        celdaContraseña.textContent = cifrarContraseña(usuario.contraseña);
    });
}

// Generar el XML y mostrar en la tabla al cargar la página
document.addEventListener("DOMContentLoaded", function() {
    generarXMLyMostrarTabla();
});
</script>

</body>
</html>
