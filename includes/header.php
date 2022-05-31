<?php
	// Preparo mi función para levantar todas las clases automáticamente
	spl_autoload_register(function ($nombre_clase) {
			require_once 'clases/'.$nombre_clase . '.php';
	});

	// Creo variables por todo lo que recibo por URL
	foreach($_GET as $n=>$v) $$n = $v;
?>

<!DOCTYPE html>
<html>
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
					<li class="nav-item"><a href="alumnos.php" class="nav-link <?php if($nav_item=="alumnos") echo "active"?>">Alumnos</a></li>
					<li class="nav-item"><a href="materias.php" class="nav-link <?php if($nav_item=="materias") echo "active"?>">Materias</a></li>
					<li class="nav-item"><a href="notas.php" class="nav-link <?php if($nav_item=="notas") echo "active"?>">Notas</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<main class="container">
		<h1 class="my-4"><?php echo $titulo_pagina?></h1>