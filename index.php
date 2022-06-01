<?php
	require "includes/config.php";

	// Obtengo todas las variables recibidas (tanto por GET como POST)
	foreach($_REQUEST as $n=>$v) $$n = $v;

	if($_POST){
		if($email!="" && $clave!=""){

			// Encripto la password que ingresa el usuario porque así está guardada en la bd
			$clave_encriptada = md5($clave);

			$usuario = new Usuario();
			$results = $usuario->validarLogin($email,$clave_encriptada);
			if($results){
				$_SESSION["usuario"] = $results[0];
				header("Location:alumnos.php");
			}
			else{
				$msg = "err_login";
			}
		}
		else{
			$msg = "err_required";
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taller PHP</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://getbootstrap.com/docs/5.2/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-200 m-auto">
  <form method="post">
    <h1 class="h3 mb-2 pb-4">Taller PHP</h1>

    <?php
    	switch($msg){
			case "ok_logout":
				echo "<div class='alert alert-success my-4'>Saliste correctamente del sistema.</div>";
				break;

			case "err_logged":
				echo "<div class='alert alert-danger my-4'>Debés loguearte para continuar.</div>";
				break;

			case "err_login":
				echo "<div class='alert alert-danger my-4'>El email y/o la contraseña son incorrectos.</div>";
				break;

			case "err_required":
				echo "<div class='alert alert-danger my-4'>Debés ingresar el email y la contraseña.</div>";
				break;
		}
    ?>

    <div class="mb-2 form-floating">
      <input type="email" class="form-control" id="email" name="email" value="<?=$email?>" placeholder="name@example.com">
      <label for="email">Correo Electrónico</label>
    </div>
    <div class="mb-2 form-floating">
      <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña">
      <label for="clave">Contraseña</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>

    <div class="mt-5">
    	<p class="text-center text-muted">Taller de PHP - Universidad Maimónides &copy;<?php echo date("Y")?></p>
    </div>
  </form>
</main>


    
  </body>
</html>
