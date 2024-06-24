<?php
include("auth.php");
include("conexion.php");

if ($_SESSION["rol"] != 'admin') {
    header("Location: index.php"); 
    exit();
}

$idcomentario = $_POST['idcomentario'];
$estado = $_POST['estado'];
$respuesta = $_POST['respuesta'];

$sql_update_respuesta = "UPDATE respuesta SET estado = ?, respuesta = ? WHERE idcomentario = ?";
$stmt_respuesta = mysqli_prepare($cn, $sql_update_respuesta);
mysqli_stmt_bind_param($stmt_respuesta, "ssi", $estado, $respuesta, $idcomentario);
if (mysqli_stmt_execute($stmt_respuesta)) {
    echo "Estado y respuesta actualizados exitosamente.";
} else {
    echo "Error al actualizar estado y respuesta: " . mysqli_error($cn);
}

mysqli_stmt_close($stmt_respuesta);
header("Location: contactenos.php");
exit();
?>
