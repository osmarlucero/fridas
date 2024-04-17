<?php
// Inicia la sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica si hay un mensaje de error en la sesión
if (isset($_SESSION['error'])) {
    $error_message = $_SESSION['error'];
    // Limpia la variable de sesión después de mostrar el mensaje
    unset($_SESSION['error']);
} else {
    $error_message = ""; // Inicializa la variable de mensaje de error
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="CSS/indexCSS.css?v=0.0.2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="Imagenes/Blockbuster_logo.svg.png" />
    <script src="app/jquery-3.5.1.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        
        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <?php
    // Inicia la sesión si no está iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Verifica si hay un mensaje de error en la sesión
    if (isset($_SESSION['error'])) {
        $error_message = $_SESSION['error'];
        // Limpia la variable de sesión después de mostrar el mensaje
        unset($_SESSION['error']);
    } else {
        $error_message = ""; // Inicializa la variable de mensaje de error
    }
    ?>
    <div class="login-container">
        <h2>Bienvenido</h2>
        <p>Por favor, inicia sesión</p>
        <form action="app/authController.php" method="POST">
            <input type="number" name="user" placeholder="User" required>
            <input type="password" name="pass" placeholder="Password" required>
                        <input type="hidden" name="access" value="login">
            
            <?php if (!empty($error_message)): ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
