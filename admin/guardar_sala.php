<?php
include '../constant/conexionDB.php'; // Asegúrate de que la ruta sea correcta

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Recuperar datos del formulario
    $nombre      = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : '';
    $descripcion = isset($_POST["descripcion"]) ? trim($_POST["descripcion"]) : '';
    $numTurnos   = isset($_POST["numTurnos"]) ? intval($_POST["numTurnos"]) : 0;
    $numUsuarios = isset($_POST["numUsuarios"]) ? intval($_POST["numUsuarios"]) : 0;

    // 2. Validar campos
    if (empty($nombre) || empty($descripcion) || $numTurnos <= 0 || $numUsuarios <= 0) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    try {
        // 3. Preparar la consulta con placeholders de PDO para la inserción en la tabla SALAS
        $query = "INSERT INTO SALAS (SALNOMBRE, SALDESCRIPCION, SALNUMEROTURNOS, SALNUMEROUSUARIOS)
                  VALUES (:nombre, :descripcion, :numTurnos, :numUsuarios)";
        
        // 4. Preparar la sentencia
        $stmt = $conn->prepare($query);

        // 5. Asignar valores a los placeholders
        $stmt->bindParam(':nombre',      $nombre,      PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':numTurnos',   $numTurnos,   PDO::PARAM_INT);
        $stmt->bindParam(':numUsuarios', $numUsuarios, PDO::PARAM_INT);

        // 6. Ejecutar la sentencia
        $stmt->execute();

        // 7. Obtener el ID de la sala recién creada
        $salaID = $conn->lastInsertId();

        // 8. Realizar el insert en la tabla RANKING con valores vacíos
        $rankingQuery = "INSERT INTO RANKING (SALID, RANIDUSERUNO, RANIDUSERDOS, RANIDUSERTRES, RANIDUSERCUATRO, 
                                           RANIDUSERCINCO, RANIDUSERSEIS, RANIDUSERSIETE, RANIDUSEROCHO, RANIDUSERNUEVE, 
                                           RANIDUSERDIEZ, RANESTADO)
                         VALUES (:salaID, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Pendiente')";
        
        // 9. Preparar la sentencia para el ranking
        $rankingStmt = $conn->prepare($rankingQuery);

        // 10. Asignar el valor del ID de la sala
        $rankingStmt->bindParam(':salaID', $salaID, PDO::PARAM_INT);

        // 11. Ejecutar el insert en la tabla RANKING
        $rankingStmt->execute();

        // 12. Redirigir a la sala de espera pasando el ID de la sala
        header("Location: ../sala_espera.php?salaID=" . $salaID);
        exit();
    } catch (PDOException $e) {
        // 13. Manejo de errores
        echo "Error al crear la sala o al insertar en el ranking: " . $e->getMessage();
    }

    // 14. Liberar recursos
    $stmt = null;
    $conn = null;
} else {
    echo "No se enviaron los datos del formulario.";
}
?>
