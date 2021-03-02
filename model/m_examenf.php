<?php
    require_once ("class_cc.php");

    class ExamenFisicoModel {
        public static function registroExamenFisico($datosController, $tabla) {
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
                                (id_paciente, cabeza, torax, abdomen, extremidades, fecha, id_estado)
                                VALUES (:id,:ca,:to, :ab, :ex, :fe, :st)");
                $stmt->bindParam(":id", $datosController["paciente"],       PDO::PARAM_INT);
                $stmt->bindParam(":ca", $datosController["cabeza"],         PDO::PARAM_STR);
                $stmt->bindParam(":to", $datosController["torax"],          PDO::PARAM_STR);
                $stmt->bindParam(":ab", $datosController["abdomen"],        PDO::PARAM_STR);
                $stmt->bindParam(":ex", $datosController["extremidades"],   PDO::PARAM_STR);
                
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



        public static function vistaExamenesModel($tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT one.id_examen, two.cedula, concat(two.nombres, ' ', two.apellidos) el_paciente, one.fecha
                                                     FROM $tabla one INNER JOIN pacientes two ON
                                                        two.id_pacientes = one.id_paciente
                                                        WHERE one.id_estado=1
                                                        ORDER BY one.id_examen DESC");
            $stmt->execute();
            return $stmt->fetchAll();

            $stmt->close();
        }

        /** EDITAR USUARIO MODEL */

        public static function editExamenModel($datosController, $tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_examen=:id");
            $stmt->bindParam(':id', $datosController, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }

        /** ACTUALIZAR DATOS DEL USUARIO MODEL */

        public static function actualizareExamenModel($datosController, $tabla){
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cabeza=:ca, torax=:to, abdomen=:ab, extremidades=:ex
                                                                    
                                                                    WHERE id_examen=:id");
                                                                    
            $stmt->bindParam(':ca',    $datosController['cabeza'], PDO::PARAM_STR);
            $stmt->bindParam(':to',    $datosController['torax'], PDO::PARAM_STR);
            $stmt->bindParam(':ab',    $datosController['abdomen'], PDO::PARAM_STR);
            $stmt->bindParam(':ex',    $datosController['extremidades'], PDO::PARAM_STR);
            
            
            $stmt->bindParam(':id', $datosController['id'], PDO::PARAM_INT);

            if( $stmt->execute() ){
                return "success";
            }else{
                return "error";
            }

            $stmt->close();
        }

        /** BORRAR USUARIO MODEL */ 
        public static function eliExamenModel($datosController, $tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_examen=:id");
            $stmt->bindParam(':id', $datosController, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }

        /** ACTUALIZAR DATOS DEL USUARIO MODEL */

        public static function eliminarExamenModel($datosController, $tabla){
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_estado=2 WHERE id_examen=:id");            
            
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