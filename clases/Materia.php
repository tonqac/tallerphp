<?php
    class Materia {
    	public function listar(){
    		$sql = "SELECT *
                    FROM materias
                    WHERE estado = 1
                    ORDER BY nombre ASC";

    		return Conexion::consultar($sql);
        }
        
        public function buscarPorId($id){
            $sql = "SELECT * FROM materias WHERE id='$id' LIMIT 1";
            $objs = Conexion::consultar($sql);
            return $objs[0];
        }

        public function crear($data){
            $sql = "INSERT INTO materias (nombre, horario, codigo, anio) 
                    VALUES (
                        '$data[nombre]',
                        '$data[horario]',
                        '$data[codigo]',
                        '$data[anio]'
                    )";

            return Conexion::ejecutar($sql);
        }
        
        public function modificar($data,$id){
            $sql = "UPDATE materias
                    SET
                        nombre='$data[nombre]',
                        horario='$data[horario]',
                        codigo='$data[codigo]',
                        anio='$data[anio]'

                    WHERE id=$id";

            return Conexion::ejecutar($sql);
        }

        public static function borrar($id){
    		$sql = "UPDATE materias SET estado=0 WHERE id=$id";
            return Conexion::ejecutar($sql);
        }
    }
?>