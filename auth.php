<?php
session_start();
include("conexion.php");

$cod = $_SESSION["usuario"];
$sql = "SELECT rol FROM usuario WHERE codalumno = '$cod'";
$result = mysqli_query($cn, $sql);
$row = mysqli_fetch_assoc($result);
$rol = $row['rol'];

$_SESSION["rol"] = $rol;

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}
?>
