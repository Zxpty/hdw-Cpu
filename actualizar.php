<?php
include("auth.php");
include("cabecera.php");
include("conexion.php");
$cod = $_SESSION["usuario"];
$sql = "select a.*,e.* 
	from usuario a, datos e 
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
	<main class="container mx-auto mt-4 space-y-4 flex flex-col items-center">
		<div class="w-full max-w-xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
			<form class="max-w-md mx-auto" action="p_actualizar.php" method="post">
				<div class="relative z-0 w-full mb-5 group">
					<input type="text" name="txtdireccion" id="floating_email" value="<?php echo $r["direccion"]; ?>" class="block py-2.5 px-0 w-full  text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
					<label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Direccion</label>
				</div>
				<div class="relative z-0 w-full mb-5 group">
					<input type="email" name="txtcorreo" id="floating_password" value="<?php echo $r["correo"]; ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
					<label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Correo</label>
				</div>
				<div class="relative z-0 w-full mb-5 group">
					<input type="date" name="txtfecha" id="floating_password" value="<?php echo $r["fechanac"]; ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
					<label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Fecha de Nacimiento</label>
				</div>
				<div class=" flex w-full flex-row gap-2 mb-5 group">
					<?php
					$vm = "";
					$vf = "";

					if ($r["sexo"] == "M") {
						$vm = "checked";
					} else {
						$vf = "checked";
					}
					?>
					<div class="flex flex-1 w-full items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
						<input id="bordered-radio-1" type="radio" value="M" <?php echo $vm; ?> name="opcsexo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
						<label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Masculino</label>
					</div>
					<div class="flex flex-1 w-full items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
						<input id="bordered-radio-2" type="radio" value="F" <?php echo $vf; ?> name="opcsexo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
						<label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Femenino</label>
					</div>


				</div>
				<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar Datos</button>
			</form>
		</div>
	</main>
</body>

</html>