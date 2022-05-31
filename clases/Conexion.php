<?php
	class Conexion{

		public static function conectar(){
			$host = "localhost";
			$dbname = "tallerphp";
			$user = "root";
			$pass = "root";
			
			try {
				$charset  = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); // Defino charset UTF8
				$cnx = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass,$charset);
				$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Muestro errores
				return $cnx;
			}
			catch (PDOException $e) {
				echo 'Error en conexión: ' . $e->getMessage();
				exit();
			}
		}

		public static function consultar($sql){ // Para ejecutar consultas SELECT
			$cnx = self::conectar();
			$stmt = $cnx->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		public static function ejecutar($sql){ // Para ejecutar INSERT, UPDATE o DELETE
			$cnx = self::conectar();
			$stmt = $cnx->prepare($sql);
			$stmt->execute();
			return $stmt->rowCount();
		}
	}
?>