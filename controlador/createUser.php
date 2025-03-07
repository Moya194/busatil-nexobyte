<?php
include '../constant/conexionDB.php';

// Recuperamos los datos del formulario y los almacenamos en variables
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = isset($_POST['cedula']) ? trim($_POST['cedula']) : '';
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $apellido = isset($_POST['apellido']) ? trim($_POST['apellido']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirmpassword = isset($_POST['confirmpassword']) ? $_POST['confirmpassword'] : '';
    $rol = isset($_POST['rol']) ? $_POST['rol'] : '';

    // Validación de contraseñas
    if ($password !== $confirmpassword) {
        echo "Las contraseñas no coinciden.";
        exit;
    }

    // Validación del correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico no es válido.";
        exit;
    }

    // Encriptar la contraseña antes de almacenarla en la base de datos
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Preparamos la consulta de inserción
    $query = "INSERT INTO USER (USECEDULA, USENOMBRE, USEAPELLIDO, USEEMAIL, USEPASSWORD, USEROL) 
              VALUES (?, ?, ?, ?, ?, ?)";

    // Preparamos la sentencia
    $stmt = $conn->prepare($query);

    // Ligamos los parámetros y ejecutamos la consulta
    $stmt->bindValue(1, $cedula);
    $stmt->bindValue(2, $nombre);
    $stmt->bindValue(3, $apellido);
    $stmt->bindValue(4, $email);
    $stmt->bindValue(5, $hashedPassword);
    $stmt->bindValue(6, $rol);

    // Ejecutamos la consulta
    if ($stmt->execute()) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar los datos.";
    }

    // Cerrar la conexión
    $conn = null;
} else {
    echo "No se enviaron los datos del formulario.";
}
?>
