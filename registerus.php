<?php 
include './config/config.php';

// Configuración de errores (recomendado para desarrollo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Iniciar sesión segura
session_start();

// Redirigir si ya está logueado
if (isset($_SESSION['username'])) {
    header("Location: usuario/welcome.php");
    exit;
}

// Variables para mantener valores del formulario
$username = $email = '';
$error = '';

// Procesar registro
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Sanitizar inputs
    $username = trim($_POST['username']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Validaciones
    if (empty($username) || empty($email) || empty($password) || empty($cpassword)) {
        $error = 'Todos los campos son obligatorios';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Formato de email inválido';
    } elseif (strlen($password) < 8) {
        $error = 'La contraseña debe tener al menos 8 caracteres';
    } elseif ($password !== $cpassword) {
        $error = 'Las contraseñas no coinciden';
    } else {
        // Verificar si el email ya existe
        $stmt = $conn->prepare("SELECT iduser FROM users WHERE email = ?");
        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            
            if ($stmt->num_rows > 0) {
                $error = 'El email ya está registrado';
            } else {
                // Hash seguro de la contraseña
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
                
                // Insertar nuevo artista
                $insert_stmt = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
                if ($insert_stmt) {
                    $insert_stmt->bind_param("sss", $username, $email, $password_hash);
                    
                    if ($insert_stmt->execute()) {
                        $_SESSION['register_success'] = '¡Registro exitoso! Por favor inicia sesión';
                        header("Location: index.php");
                        exit;
                    } else {
                        $error = 'Error al registrar: ' . $conn->error;
                    }
                } else {
                    $error = 'Error en la consulta de registro';
                }
            }
        } else {
            $error = 'Error en la consulta de verificación';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./css/IR.css">
    <title>Registro de Usuario</title>
    <style>
        .error-message {
            color: #ff3860;
            font-size: 12px;
            margin: -10px 0 15px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Registro</p>
            
            <?php if (!empty($error)): ?>
                <div class="error-message"><?= htmlspecialchars($error); ?></div>
            <?php endif; ?>
            
            <div class="input-group">
                <input type="text" placeholder="Nombre del usuario" name="username" 
                       value="<?= htmlspecialchars($username); ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Correo Electrónico" name="email" 
                       value="<?= htmlspecialchars($email); ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Contraseña" name="password" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirmar Contraseña" name="cpassword" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Registrarme</button>
            </div>
            <p class="login-register-text">¿Ya tienes una cuenta? <a href="index.php">Inicia Sesión</a></p>
        </form>
    </div>
</body>
</html>
