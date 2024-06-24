<?php

include("auth.php");

$cod = $_SESSION["usuario"];


$archivo = $_FILES["archivo"]["tmp_name"];
$nombre = $_FILES["archivo"]["name"];

list($n, $e) = explode(".", $nombre);


if ($e == "jpg") {

	move_uploaded_file($archivo, "imgalumno/" . $cod . ".jpg");
	header('location: principal.php');
} else {
	$mensaje = "SOLO JPG WE";
	header('location: imagenperfil.php?msj=' . $mensaje . " " . $e);
}
