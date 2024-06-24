<?php
include("auth.php");
include("cabecera.php");
include("conexion.php");
$cod = $_SESSION["usuario"];
$sql = "select a.*,e.* 
	from alumno a, datos e 
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
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-end px-4 pt-4">
                <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                    <span class="sr-only">Open dropdown</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2" aria-labelledby="dropdownButton">
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export Data</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col items-center pb-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="./imgalumno/<?php echo $cod; ?>.jpg"/>
                <h5 class="mb-1 text-xs flex justify-center font-medium text-gray-900 dark:text-white"><?php echo $r["paterno"] . " " . $r["materno"] . ", " . $r["nombre"] ?></h5>
                <h7 class="mb-1 text-xs flex justify-center font-medium text-gray-900 dark:text-blue-600"><?php echo $r["escuela"] ?></h7>
                <span class="text-sm text-gray-500 dark:text-gray-400"><?php echo $r["codalumno"]; ?></span>
                <span class="text-sm text-gray-500 dark:text-gray-400"><?php echo $r["sexo"]; ?></span>
                <ul class="mt-3 divide-y rounded px-3 text-gray-900 dark:text-white ">
                    <li class="flex items-center py-3 text-sm gap-1">
                        <span>Aula</span>
                        <span class="ml-auto"><span class="rounded-full dark:bg-blue-600 py-1 px-2 text-xs font-medium dark:text-white"><?php echo $r["aula"]; ?></span></span>
                    </li>
                    <?php
                    if ($r["estado"] == 0) {
                        echo "<center><h2 id='titulo'>Actualiza tus datos personales</h2></center>";
                    } else {
                    ?>
                        <li class="flex items-center py-3 text-sm gap-1">
                            <span>Direccion</span>
                            <span class="ml-auto"><?php echo $r["direccion"]; ?></span>
                        </li>
                        <li class="flex items-center py-3 text-sm gap-1">
                            <span>Correo</span>
                            <span class="ml-auto"><?php echo $r["correo"]; ?></span>
                        </li>
                        <li class="flex items-center py-3 text-sm gap-1">
                            <span>Fecha Nacimiento</span>
                            <span class="ml-auto"><?php echo $r["fechanac"]; ?></span>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </main>
</body>

</html>