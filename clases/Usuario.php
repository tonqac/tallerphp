<?php
    class Usuario {
    	public function listar(){
    		$sql = "SELECT *
                    FROM usuarios
                    WHERE estado = 1
                    ORDER BY nombre ASC";

    		return Conexion::consultar($sql);
        }
        
        public function buscarPorId($id){
            $sql = "SELECT * FROM usuarios WHERE id='$id' LIMIT 1";
            $objs = Conexion::consultar($sql);
            return $objs[0];
        }

        public function crear($data){
            try{
                $sql = "INSERT INTO usuarios (nombre, email, clave) 
                        VALUES (
                            '$data[nombre]',
                            '$data[email]',
                            '$data[clave]'
                        )";

                return Conexion::ejecutar($sql);
            }
            catch(Exception $e) {
                return false;
            }
        }
        
        public function modificar($data,$id){
            try{            
                $sql = "UPDATE usuarios
                        SET
                            nombre='$data[nombre]',
                            email='$data[email]',
                            clave='$data[clave]'

                        WHERE id=$id";

                return Conexion::ejecutar($sql);
            }
            catch(Exception $e) {
                return false;
            }
        }

        public function borrar($id){
    		$sql = "UPDATE usuarios SET estado=0 WHERE id=$id";
            return Conexion::ejecutar($sql);
        }

        public function validarLogin($email,$clave){
            $sql = "SELECT * FROM usuarios
                    WHERE email='$email' AND clave='$clave' AND estado=1";

            return Conexion::consultar($sql);
        }
    }
?>