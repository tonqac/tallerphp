<?php
	// Oculto los mensajes de warning del Apache
	error_reporting(E_ALL & ~E_NOTICE);

	// Inicio la sesión para validar al usuario
	session_start();

	// Preparo mi función para levantar todas las clases automáticamente
	spl_autoload_register(function ($nombre_clase) {
		require_once 'clases/'.$nombre_clase . '.php';
	});
?>