<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>


<center><h1>Reporte general</h1></center>



<table align="center" border="0" width="1200">
	<tr>
		<td>CODIGO</td>
		<td>APELLIDOS Y NOMBRES</td>
		<td>ESCUELA</td>
		<td>AULA</td>
	</tr>



<?php  
include("conexion.php");


if (isset($_GET["lim"])) {

	$l=$_GET["lim"];
	$sqla="select * from tbalumno
		limit $l,30";


} else {
	
		$sqla="select * from tbalumno
		limit 0,30";
}
















$f=mysqli_query($cn,$sqla);
while ($r=mysqli_fetch_assoc($f)) {
	// code...


?>


	<tr>
		<td><?php echo $r["codalumno"]; ?></td>
		<td><?php echo utf8_encode($r["apaterno"]." ".$r["amaterno"]." ".$r["nombre"]); ?></td>
		<td><?php echo utf8_encode($r["escuela"]); ?></td>
		<td><?php echo $r["aula"]; ?></td>
	</tr>

<?php  

}

?>

</table>


<br>


<center>
	


<?php 


$sqltotal="select count(*) as cantidad from tbalumno";

$ft=mysqli_query($cn,$sqltotal);
$rt=mysqli_fetch_assoc($ft);

$total=$rt["cantidad"];

$cantregistroxpagina=30;

$nropaginas=ceil($total/$cantregistroxpagina);



for ($i=0; $i <$nropaginas ; $i++) { 
	// code...

$limi=$i*$cantregistroxpagina;

echo "<a target='_parent' href='reporte.php?lim=$limi'>".($i+1)."</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";


}


 ?>


</center>












</body>
</html>