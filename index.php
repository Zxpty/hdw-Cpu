<!DOCTYPE html >
<html class="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="output.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</head>

<body class=" dark:bg-gray-900">
  <section class=" dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold  dark:text-white">
        <img class="w-8 h-8 mr-2" src="Logo_UNJFSC.png" alt="logo">
        Centro PreUniversitario
      </a>
      <div class="w-full  rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight  md:text-2xl dark:text-white">
            Inicia Sesión
          </h1>
          <form class="space-y-4 md:space-y-6" action="p_login.php" method="post">
            <div>
              <label for="email" class="block mb-2 text-sm font-medium  dark:text-white">Tu Usuario</label>
              <input type="text" name="txtusuario" id="email" class=" border   rounded-lg  block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
            </div>
            <div>
              <label for="password" class="block mb-2 text-sm font-medium  dark:text-white">Tu Contraseña</label>
              <input type="password" name="txtpassword" id="password" placeholder="••••••••" class=" border   rounded-lg  block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
            </div>
            <input type="submit" value="Iniciar Sesión" class="w-full text-white bg-primary-600  hover:bg-primary-700 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
          </form>
        </div>
      </div>
    </div>
    <div>
  </section>
</body>

</html>