<?php
include("auth.php");
include("cabecera.php");
include("conexion.php");
$cod = $_SESSION["usuario"];
$sql = "select a.*,e.* 
	from usuario a, alumno e 
	where  a.codalumno=e.codalumno and
	a.codalumno='$cod'";
$f = mysqli_query($cn, $sql);
$r = mysqli_fetch_assoc($f);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>

<body class="bg-gray-50 dark:bg-gray-900">

	<!-- <form action="p_imagenperfil.php" method="post" enctype="multipart/form-data">
		<center>
			Escoger archivo (solo jpg)
			<input type="file" name="archivo">
			<input type="submit" value="Cargar Foto">
		</center>

	</form>

	 -->


	<main class="container mx-auto mt-4 space-y-4 flex flex-col items-center">
		<div class="w-full max-w-xl p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
			<form class="flex flex-col gap-2" action="p_imagenperfil.php" method="post" enctype="multipart/form-data">
				<div class="flex items-center justify-center w-full">
					<label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
						<div class="flex flex-col items-center justify-center pt-5 pb-6">
							<svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
							</svg>
							<p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
							<p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
						</div>
						<input id="dropzone-file" name="archivo" type="file" class="hidden" />
					</label>
				</div>
				<input type="submit" value="Cambiar foto de Perfil" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
			</form>
		</div>
	</main>
	<br><br><br>

	<?php


	if (isset($_GET["msj"])) {

		$mensaje = $_GET["msj"];

		echo "<center><h1 id='titulo'>$mensaje</h1></center>";
	}
	?>
</body>

</html>