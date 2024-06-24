<?php 

include("auth.php");
include("conexion.php");

$codigo=$_SESSION["usuario"];

$passactual=$_POST["pwdpassactual"];
$pass=$_POST["pwdpass"];
$repass=$_POST["pwdrepass"];


$sql="select * from usuario where codalumno='$codigo' and password='$passactual'";

$f=mysqli_query($cn,$sql);
$r=mysqli_fetch_assoc($f);

$valor=$r["codalumno"];

if ($valor==null) {

	header('location: cambiarpass.php');
	
} else {
	
		if (strcmp($pass,$repass)==0) {
			

		 			if (strlen(trim($pass))==8 && strlen(trim($repass))==8) {
		 				

		 					$sqlu="update usuario
		 						set password='$pass'
		 						where codalumno='$codigo'";

		 						mysqli_query($cn,$sqlu);
		 						header('location: cerrarsesion.php');



		 			} else {
		 				header('location: cambiarpass.php');
		 			}
		 			




		} else {
			header('location: cambiarpass.php');
		}



}





 ?>
