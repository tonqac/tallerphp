<?php
	require_once "config.php";

	// Si no está logueado, lo redirecciono al login
	if(empty($_SESSION["usuario"])){
		header("Location: index.php?msg=err_logged");
		exit;
	}

	// Obtengo todas las variables recibidas (tanto por GET como POST)
	foreach($_REQUEST as $n=>$v) $$n = $v;
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

	<title>Taller PHP - <?php echo $titulo_pagina?></title>
</head>
<body>
	
    <header class="py-3 mb-4 border-bottom">
    	<div class="container d-flex flex-wrap justify-content-center ">
			<h1 class="d-flex align-items-center mb-3 mb-md-0 me-md-auto">
				<a href="index.php" class="fs-4 text-dark text-decoration-none">Taller PHP</a>
			</h1>

			<nav>
				<ul class="nav nav-pills">
					<li class="nav-item">
						<a href="alumnos.php" class="nav-link <?php if($nav_item=="alumnos") echo "link-secondary fw-bold"?>">Alumnos</a>
					</li>
					<li class="nav-item">
						<a href="materias.php" class="nav-link <?php if($nav_item=="materias") echo "link-secondary fw-bold"?>">Materias</a>
					</li>
					<li class="nav-item">
						<a href="notas.php" class="nav-link <?php if($nav_item=="notas") echo "link-secondary fw-bold"?>">Notas</a>
					</li>

					<li class="nav-item">
						<a href="logout.php" class="btn btn-light">Logout</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>

	<main class="container">
		<h1 class="my-4"><?php echo $titulo_pagina?></h1>

		<?php
			// Si recibo la variable de confirmación, muestro el mensaje en pantalla
			if($msg=="ok"){
				echo "<div class='alert alert-success'>Los cambios se guardaron exitosamente.</div>";
			}
		?>