<?php
    class Alumno {
    	public function listar(){
    		$sql = "SELECT *
                    FROM alumnos
                    WHERE estado = 1
                    ORDER BY nombre ASC";

    		return Conexion::consultar($sql);
        }
        
        public function buscarPorId($id){
            $sql = "SELECT * FROM alumnos WHERE id='$id' LIMIT 1";
            $objs = Conexion::consultar($sql);
            return $objs[0];
        }

        public function crear($data){
            try{
                $sql = "INSERT INTO alumnos (nombre, apellido, email, telefono) 
                        VALUES (
                            '$data[nombre]',
                            '$data[apellido]',
                            '$data[email]',
                            '$data[telefono]'
                        )";

                return Conexion::ejecutar($sql);
            }
            catch(Exception $e) {
                return false;
            }
        }
        
        public function modificar($data,$id){
            try{            
                $sql = "UPDATE alumnos
                        SET
                            nombre='$data[nombre]',
                            apellido='$data[apellido]',
                            email='$data[email]',
                            telefono='$data[telefono]'

                        WHERE id=$id";

                Conexion::ejecutar($sql);
                return true;
            }
            catch(Exception $e) {
                return false;
            }
        }

        public function borrar($id){
    		$sql = "UPDATE alumnos SET estado=0 WHERE id=$id";
            return Conexion::ejecutar($sql);
        }
    }
?>