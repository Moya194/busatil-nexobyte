<?php
include '../constant/conexionDB.php'; // Debe tener $conn como un objeto PDO

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula          = isset($_POST['cedula']) ? trim($_POST['cedula']) : '';
    $nombre          = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $apellido        = isset($_POST['apellido']) ? trim($_POST['apellido']) : '';
    $email           = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password        = isset($_POST['password']) ? $_POST['password'] : '';
    $confirmpassword = isset($_POST['confirmpassword']) ? $_POST['confirmpassword'] : '';
    $rol             = isset($_POST['rol']) ? $_POST['rol'] : '';
    $saldo           = isset($_POST['saldo']) ? $_POST['saldo'] : '';
    
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

    // Encriptar la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Consulta con placeholders de PDO (nombrados o ?)
        $query = "INSERT INTO USER (USECEDULA, USENOMBRE, USEAPELLIDO, USEEMAIL, USEPASSWORD, USEROL, USESALDO) 
                  VALUES (:cedula, :nombre, :apellido, :email, :hashedPassword, :rol, :saldo)";

        $stmt = $conn->prepare($query);

        // Asignamos los valores a cada placeholder
        $stmt->bindParam(':cedula', $cedula, PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':hashedPassword', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':rol', $rol, PDO::PARAM_STR);
        $stmt->bindParam(':saldo', $saldo, PDO::PARAM_STR);

        // Ejecutamos la consulta
        $stmt->execute();
        echo "Datos insertados correctamente.";

        // Redirigir a la página de login
        header("Location: ../auth-login.php");
        exit(); // Asegurarse de que el script termine después de la redirección

        // Cerrar la conexión
        $stmt = null;
        $conn = null;

    } catch (PDOException $e) {
        echo "Error al insertar los datos: " . $e->getMessage();
    }
} else {
    echo "No se enviaron los datos del formulario.";
}
?>
