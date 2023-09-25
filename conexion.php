<?php
// Este archivo establece la conexión con la base de datos MySQL y define funciones útiles
$host = 'localhost';
$usuario = 'root';
$contraseña = '';
$bbdd = 'todolist';

$conexion = new mysqli($host, $usuario, $contraseña, $bbdd);
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

function dbQuery($sql)
{
    global $conexion;
    return $conexion->query($sql);
}

function dbFetchAssoc($result)
{
    return $result->fetch_assoc();
}

// Función para registrar un nuevo usuario
function registrarUsuario($nombre, $email, $contraseña)
{
    $contraseñaHash = password_hash($contraseña, PASSWORD_DEFAULT); // Hashear la contraseña antes de guardarla
    $sql = "INSERT INTO usuarios (nombre, email, contraseña) VALUES ('$nombre', '$email', '$contraseñaHash')";
    return dbQuery($sql);
}

// Función para verificar las credenciales de un usuario
function verificarUsuario($email, $contraseña)
{
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = dbQuery($sql);
    $usuario = dbFetchAssoc($result);
    if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
        return $usuario;
    }
    return false;
}
