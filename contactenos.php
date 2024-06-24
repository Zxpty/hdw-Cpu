<?php
include("auth.php");
include("cabecera.php");
include("conexion.php");

$cod = $_SESSION["usuario"];
$rol = $_SESSION["rol"];
if ($rol == 'admin') {
    $sql = "SELECT a.*, n.* FROM alumno a, comentario n WHERE a.codalumno = n.codalumno";
} else {
    $sql = "SELECT a.*, n.* FROM alumno a, comentario n WHERE a.codalumno = n.codalumno AND a.codalumno = '$cod'";
}

$f = mysqli_query($cn, $sql);

?>
<main class="container mx-auto mt-4 space-y-4 flex flex-col items-center">
    <div class="w-full flex flex-col max-w-xl p-2 ">
        <div class="flex p-2 w-full bg-white border border-gray-200 rounded-t-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-2 items-center text-white">Iniciar una conversación</div>

            <!-- Modal toggle -->
            <div class="flex flex-1 justify-end items-center w-full">
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Publicar
                </button>
            </div>

            <!-- Main modal -->
            <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Nuevo Comentario
                            </h3>
                            <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <form class="space-y-4" action="enviar-comentario.php" method="POST">
                                <div>
                                    <label for="tipo_comentario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione el tipo de comentario</label>
                                    <select id="tipo_comentario" name="tipo_comentario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="Consulta">Consulta</option>
                                        <option value="Sugerencia">Sugerencia</option>
                                        <option value="Queja">Queja</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción de tu mensaje</label>
                                    <textarea id="descripcion" name="descripcion" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escribe tus comentarios aquí..."></textarea>
                                </div>
                                <input type="submit" value="Publicar" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <?php while ($r = mysqli_fetch_assoc($f)) { ?>
                <div class="flex flex-row p-2 gap-2 w-full bg-white border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col">
                        <div class="flex">
                            <div class="flex gap-1 justify-center items-center">
                                <p class="text-white"><?php echo strtolower("@" . $r['nombre']); ?></p>
                                <p class="text-gray-400" style="font-size: 12px;"><?php echo date('Y-m-d H:i:s', strtotime($r['fecha'])); ?></p>
                            </div>
                        </div>
                        <div class="pb-2">
                            <p class="text-gray-400 text-xs"><?php echo $r['descripcion']; ?></p>
                            <p class="text-green-200 text-xs" style="color: rgb(188 240 218);"><?php echo $r['estado']; ?></p>
                        </div>
                        <div class="flex flex-row gap-2">
                            <div class="text-gray-900 dark:text-white">
                                <?php if ($rol == 'admin') { ?>
                                    <button data-modal-target="actualizar-estado-<?php echo $r['idcomentario']; ?>" data-modal-toggle="actualizar-estado-<?php echo $r['idcomentario']; ?>" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                        Estado
                                    </button>

                                    <div id="actualizar-estado-<?php echo $r['idcomentario']; ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                        Actualizar Estado y Responder
                                                    </h3>
                                                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="actualizar-estado-<?php echo $r['idcomentario']; ?>">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-4 md:p-5">
                                                    <form class="space-y-4" action="actualizar_estado.php" method="POST">
                                                        <input type="hidden" name="idcomentario" value="<?php echo $r['idcomentario']; ?>">
                                                        <div>
                                                            <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                                                            <select id="estado" name="estado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <option value="Enviado" <?php if ($r['estado'] == 'Enviado') echo 'selected'; ?>>Enviado</option>
                                                                <option value="Recibido" <?php if ($r['estado'] == 'Recibido') echo 'selected'; ?>>Recibido</option>
                                                                <option value="Comentado" <?php if ($r['estado'] == 'Comentado') echo 'selected'; ?>>Comentado</option>
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <label for="respuesta" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Respuesta</label>
                                                            <textarea id="respuesta" name="respuesta" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escribe tu respuesta aquí..."></textarea>
                                                        </div>
                                                        <input type="submit" value="Actualizar y Responder" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="text-gray-900 dark:text-white">

                                <button data-modal-target="ver-respuesta-<?php echo $r['idcomentario']; ?>" data-modal-toggle="ver-respuesta-<?php echo $r['idcomentario']; ?>" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    Respuestas
                                </button>

                                <div id="ver-respuesta-<?php echo $r['idcomentario']; ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Respuestas a tu comentario
                                                </h3>
                                                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="ver-respuesta-<?php echo $r['idcomentario']; ?>">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5">
                                                <?php
                                                // Query to get responses for the current comment
                                                $sql_respuestas = "SELECT r.* FROM respuesta r WHERE r.idcomentario = " . $r['idcomentario'];
                                                $respuestas = mysqli_query($cn, $sql_respuestas);
                                                while ($respuesta = mysqli_fetch_assoc($respuestas)) {
                                                    echo '<div class="pl-4 ml-4 border-l-2 border-gray-200">';
                                                    echo '<p class="text-sm text-gray-400">' . $respuesta['respuesta'] . '</p>';
                                                    echo '<p class="text-xs text-gray-400">' . date('Y-m-d H:i:s', strtotime($respuesta['fecha'])) . '</p>';
                                                    echo '</div>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>