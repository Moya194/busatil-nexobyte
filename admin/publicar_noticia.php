<?php
include "../constant/conexionDB.php"; // $conn es un objeto PDO

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $salid = $_POST["salid"];
    $descripcion = $_POST["descripcion"];
    $sentimiento = $_POST["sentimiento"];

    try {
        $sql = "INSERT INTO NOTICIAS (SALID, NOTDESCRIPCION, NOTSENTIMIENTO) 
                VALUES (:salid, :descripcion, :sentimiento)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':salid', $salid, PDO::PARAM_INT);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':sentimiento', $sentimiento, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Noticia publicada con éxito.";
        } else {
            echo "Error al publicar la noticia.";
        }
    } catch (PDOException $e) {
        echo "Error al publicar la noticia: " . $e->getMessage();
    }
}
?>
