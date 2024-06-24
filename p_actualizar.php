<?php 
include("auth.php");
include("conexion.php");

$cod=$_SESSION["usuario"];

$direccion=$_POST["txtdireccion"];
$correo=$_POST["txtcorreo"];
$fecha=$_POST["txtfecha"];
$celular=$_POST["txtcelular"];
$sexo=$_POST["opcsexo"];

$sql="update datos
	set direccion='$direccion',
	correo='$correo',
	fechanac='$fecha',
	sexo='$sexo',
	estado=1
	where codalumno='$cod'";

mysqli_query($cn,$sql);

header('location: principal.php');



 ?>