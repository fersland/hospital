<?php
    require_once ("class_cc.php");

    class PrescripcionModel {
        public static function registroPrescripcionModel($datosController, $tabla) {
            // Validar usuario repetido
            $fecha = date('Y-m-d');
            $estado = 1;
            
            /*$send = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_paciente=:id AND fecha=:fec");
            $send->bindParam(':id', $datosController["paciente"], PDO::PARAM_STR);
            $send->bindParam(':fec', $fecha, PDO::PARAM_STR);
            $send->execute();
            $count = $send->rowCount();

            if ($count == 0) {*/
                $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
                                (id_paciente, categoria, descripcion, fecha, id_estado)
                                VALUES (:id,:ca,:de, :fe, :st)");
                $stmt->bindParam(":id", $datosController["paciente"],       PDO::PARAM_INT);
                $stmt->bindParam(":ca", $datosController["categoria"],      PDO::PARAM_STR);
                $stmt->bindParam(":de", $datosController["desc"],          PDO::PARAM_STR);
                
                $stmt->bindParam(":fe", $fecha,   PDO::PARAM_STR);
                $stmt->bindParam(":st", $estado,   PDO::PARAM_INT);

                if($stmt->execute()) {
                    
                    
                    return "success";
                }else{
                    return "Error";
                }
            /*}else{
                return "Error";
            }*/
            

            $stmt->close();
        }

        
        /*********************************************
             ** GINECOLOGIA
        *********************************************/

        public static function vistaPrescripcionEcosModel($tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT one.id_presc, one.categoria, two.cedula, concat(two.nombres, ' ', two.apellidos) el_paciente, one.descripcion, one.fecha
                                                     FROM $tabla one INNER JOIN pacientes two ON
                                                        two.id_pacientes = one.id_paciente
                                                            WHERE one.id_estado = 1
                                                        ORDER BY one.id_presc DESC");
            $stmt->execute();
            return $stmt->fetchAll();

            $stmt->close();
        }

        /** EDITAR PRESCRIPCION MODEL */

        public static function editPrescripcionModel($datosController, $tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_presc=:id");
            $stmt->bindParam(':id', $datosController, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }

        /** ACTUALIZAR DATOS DEL LA PRESCRIPCION MODEL */

        public static function actualizarPrescripcionModel($datosController, $tabla){
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria=:ca, descripcion=:de WHERE id_presc=:id");
                                                                    
            $stmt->bindParam(':ca',     $datosController['categoria'], PDO::PARAM_STR);
            $stmt->bindParam(':de',    $datosController['desc'], PDO::PARAM_STR);            
            
            $stmt->bindParam(':id', $datosController['id'], PDO::PARAM_INT);

            if( $stmt->execute() ){
                return "success";
            }else{
                return "error";
            }

            $stmt->close();
        }

        /** BORRAR PRESCRIPCION MODEL */ 

        public static function eliPrescripcionModel($datosController, $tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_presc=:id");
            $stmt->bindParam(':id', $datosController, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }

        /** ELIMINAR DATOS DEL LA PRESCRIPCION MODEL */

        public static function eliminarPrescripcionModel($datosController, $tabla){
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_estado=2 WHERE id_presc=:id");
                                                                    
            $stmt->bindParam(':id', $datosController['id'], PDO::PARAM_INT);

            if( $stmt->execute() ){
                return "success";
            }else{
                return "error";
            }

            $stmt->close();
        }

        public static function estadisticasEmpleadoModel($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            $cant = $stmt->rowCount();

            return $cant;
            $stmt->close();
        }
    }