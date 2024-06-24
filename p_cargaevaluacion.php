<?php 
include("conexion.php");
$archivo=$_FILES["archivo"]["tmp_name"];
$opcion=$_POST["lstnota"];
$f=file($archivo);

for ($i=0; $i <count($f) ; $i++) { 
list($codigo,$nota)=explode(";",$f[$i]);

$sql="update tbnota
set n$opcion=$nota
where codalumno='$codigo'";

mysqli_query($cn,$sql);

}



 ?>