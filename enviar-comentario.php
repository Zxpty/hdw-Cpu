<?php
ob_start();
include("auth.php");
include("cabecera.php");
include("conexion.php");

$cod = $_SESSION["usuario"];
$tipo_comentario = $_POST['tipo_comentario'];
$descripcion = $_POST['descripcion'];
$sql_comentario = "INSERT INTO comentario (codalumno, tipocomentario, descripcion, estado, fecha) VALUES (?, ?, ?, 'Enviado', current_timestamp())";
$stmt_comentario = mysqli_prepare($cn, $sql_comentario);
mysqli_stmt_bind_param($stmt_comentario, "sss", $cod, $tipo_comentario, $descripcion);

if (mysqli_stmt_execute($stmt_comentario)) {
    $id_comentario = mysqli_insert_id($cn);
    $estado_respuesta = 'Pendiente';
    $sql_respuesta = "INSERT INTO respuesta (idcomentario, codalumno, estado, fecha) VALUES (?, ?, ?, current_timestamp())";
    $stmt_respuesta = mysqli_prepare($cn, $sql_respuesta);
    mysqli_stmt_bind_param($stmt_respuesta, "iss", $id_comentario, $cod, $estado_respuesta);

    if (mysqli_stmt_execute($stmt_respuesta)) {
        header('location: contactenos.php');
        exit();
    } else {
        echo "Error al enviar la respuesta: " . mysqli_error($cn);
    }

    mysqli_stmt_close($stmt_respuesta);
} else {
    echo "Error al enviar el comentario: " . mysqli_error($cn);
}

mysqli_stmt_close($stmt_comentario);
mysqli_close($cn);

ob_end_flush();
?>
