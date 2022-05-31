<?php
    class Nota {
    	public function listar($id_alumno='',$id_materia=''){
            if($id_alumno!="") $where.= " AND a.id = $id_alumno";
            if($id_materia!="") $where.= " AND m.id = $id_materia";

    		$sql = "SELECT n.*,
                        CONCAT(a.nombre,' ',a.apellido) as alumno,
                        m.nombre as materia

                    FROM notas n
                    JOIN alumnos a on a.id = n.id_alumno
                    JOIN materias m on m.id = n.id_materia

                    WHERE n.estado = 1 AND a.estado = 1 and m.estado = 1 $where
                    ORDER BY alumno, materia";

    		return Conexion::consultar($sql);
        }
        
        public function buscarPorId($id){
            $sql = "SELECT * FROM notas WHERE id='$id' LIMIT 1";
            $objs = Conexion::consultar($sql);
            return $objs[0];
        }

        public function crear($data){
            $sql = "INSERT INTO notas (id_alumno, id_materia, nota) 
                    VALUES (
                        '$data[id_alumno]',
                        '$data[id_materia]',
                        '$data[nota]'
                    )";

            return Conexion::ejecutar($sql);
        }
        
        public function modificar($data,$id){
            $sql = "UPDATE notas
                    SET
                        id_alumno='$data[id_alumno]',
                        id_materia='$data[id_materia]',
                        nota='$data[nota]'

                    WHERE id=$id";

            return Conexion::ejecutar($sql);
        }

        public static function borrar($id){
    		$sql = "UPDATE notas SET estado=0 WHERE id=$id";
            return Conexion::ejecutar($sql);
        }
    }
?>