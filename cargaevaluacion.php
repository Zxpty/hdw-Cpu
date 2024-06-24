<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>


<center><h1>Carga de Notas</h1></center>


<br>


<center>
<form action="p_cargaevaluacion.php" method="post" enctype="multipart/form-data">
	

Escoger archivo
<input type="file" name="archivo">


<select name="lstnota">
	
<option value="1">Evaluación  1</option>
<option value="2">Evaluación  2</option>
<option value="3">Evaluación  3</option>
<option value="4">Evaluación  4</option>

</select>

<input type="submit" value="Alimentar Evaluaciones" name="btnalimentar">



</form>


</center>



</body>
</html>