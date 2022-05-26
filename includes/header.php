<?php
	session_start();

	spl_autoload_register(function ($nombre_clase) {
			require_once 'clases/'.$nombre_clase . '.php';
	});
?>