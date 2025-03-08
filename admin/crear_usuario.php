<?php
    include "../constant/conexionDB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cedula = $_POST["cedula"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); 
    $rol = $_POST["rol"];
    $saldo = $_POST["saldo"];

    $sql = "INSERT INTO USER (USECEDULA, USENOMBRE, USEAPELLIDO, USEEMAIL, USEPASSWORD, USEROL, USESALDO) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssd", $cedula, $nombre, $apellido, $email, $password, $rol, $saldo);

    if ($stmt->execute()) {
        echo "Usuario registrado con éxito.";
    } else {
        echo "Error al registrar el usuario.";
    }
}
?>
