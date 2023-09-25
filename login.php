<?php
include 'conexion.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    $usuario = verificarUsuario($email, $contraseña); // Verificar las credenciales del usuario

    if ($usuario) {
        $_SESSION['usuario_id'] = $usuario['id']; // Almacenar el ID del usuario en la sesión
        header("Location: index.php"); // Redirigir al usuario a la página principal
    } else {
        $errorLogin = "Email o contraseña incorrectos";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    if (registrarUsuario($nombre, $email, $contraseña)) { // Registrar el nuevo usuario
        $successRegister = "Usuario registrado con éxito";
    } else {
        $errorRegister = "Error al registrar el usuario";
    }
}

include 'header.php'; // Incluir el archivo de encabezado
?>

<style>
     .card-container {
        perspective: 1000px;
    }

    .card {
        width: 100%;
        transform-style: preserve-3d;
        transition: transform 0.6s;
    }

    .front,
    .back {
        backface-visibility: hidden;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

    .front {
        z-index: 2;
        transform: rotateY(0deg);
    }

    .back {
        transform: rotateY(180deg);
    }

    .card.flipped {
        transform: rotateY(180deg);
    }
</style>

<div class="container animate__animated animate__fadeIn">
    <div class="card-container animate__animated animate__fadeIn">
        <div class="card">
            <div class="front">
                <h2 class="mb-4">Iniciar Sesión</h2>
                <form method="POST" action="login.php" id="loginForm">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="contraseña" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Iniciar Sesión</button>
                    <a href="#" class="flip-card-btn mt-3 d-block">¿No tienes una cuenta? Regístrate</a>
                </form>
                <?php if (isset($errorLogin)) : ?>
                    <p class="text-danger mt-3 animate__animated animate__headShake"><?= $errorLogin ?></p>
                <?php endif; ?>
            </div>
            <div class="back">
                <h2 class="mb-4">Registro</h2>
                <form method="POST" action="login.php" id="registerForm">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="contraseña" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                    </div>
                    <button type="submit" name="register" class="btn btn-success">Registrar</button>
                    <a href="#" class="flip-card-btn mt-3 d-block">¿Ya tienes una cuenta? Inicia sesión</a>
                </form>
                <?php if (isset($errorRegister)) : ?>
                    <p class="text-danger mt-3 animate__animated animate__headShake"><?= $errorRegister ?></p>
                <?php endif; ?>
                <?php if (isset($successRegister)) : ?>
                    <p class="text-success mt-3 animate__animated animate__bounceIn"><?= $successRegister ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    // Script para animar el giro de la tarjeta de login/registrar
    $(document).ready(function() {
        $('.flip-card-btn').click(function(e) {
            e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
            $('.card').toggleClass('flipped');
        });

        // Ejemplo de uso de Sweet Alert para el formulario de login
        $('#loginForm').submit(function(e) {
            e.preventDefault(); // Prevenir el comportamiento predeterminado del formulario
            // Aquí puedes agregar las verificaciones o acciones que necesites antes de enviar el formulario
            swal("¡Bienvenido!", "Has iniciado sesión con éxito.", "success");
        });

        // Ejemplo de uso de Sweet Alert para el formulario de registro
        $('#registerForm').submit(function(e) {
            e.preventDefault(); // Prevenir el comportamiento predeterminado del formulario
            // Aquí puedes agregar las verificaciones o acciones que necesites antes de enviar el formulario
            swal("¡Registrado!", "Tu cuenta ha sido creada con éxito.", "success");
        });
    });
</script>

<?php include 'footer.php'; ?>