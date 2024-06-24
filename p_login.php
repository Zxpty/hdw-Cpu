<?php  
session_start();
include("conexion.php");
$usu=$_POST["txtusuario"];
$pass=$_POST["txtpassword"];

$sql="select * from usuario where codalumno='$usu' and password='$pass'";

$fila=mysqli_query($cn,$sql);

$r=mysqli_fetch_assoc($fila);

$valor=$r["codalumno"];

if ($valor==null) {
header('location: index.php');
} else {
$_SESSION["usuario"]=$valor;
$_SESSION["auth"]=1;
	
header('location: inicio.php');	

}

?>