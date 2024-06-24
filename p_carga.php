<?php 

include("conexion.php");

//recepcionar lo que viene del formulario

$archivo=$_FILES["archivo"]["tmp_name"];

//file: permitia tomar los datos que hay dentro de un archivo para poder guardarlos luego en un arreglo

$f=file($archivo);

for ($i=0; $i <count($f) ; $i++) { 

		list($c,$n,$ap,$am,$e,$a)=explode(";",$f[$i]);

/*
		$sqlalumno="insert into tbalumno(codalumno,nombre, apaterno,amaterno,escuela,aula)
		values('$c','$n','$ap','$am','$e','$a')";

		$sqlnota="insert into tbnota(codalumno)
		values('$c')";

		$pass=generapass();

		$sqlusuario="insert into tbusuario(codalumno, password)
		values('$c','$pass')";

		mysqli_query($cn,$sqlalumno);
		mysqli_query($cn,$sqlnota);
		mysqli_query($cn,$sqlusuario);
*/
		$sqlespecifico="insert into alumno(codalumno)
						values('$c')";
		mysqli_query($cn,$sqlespecifico);
}





function generapass(){

		$plantilla="qwertyuiopasdfghjklzxcvbnm1234567890";
		$password="";

		for ($i=1; $i <=8 ; $i++) { 
			
//substr(la cadena,posicion,cantcaracteres)
//rand(limi,lims)			

				$password=$password.substr($plantilla,rand(1,36),1);



		}

return $password;

}








 ?>