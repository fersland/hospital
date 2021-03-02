<?php
    require_once ("class_cc.php");

    class AfiliacionPacienteModel {
        public static function registroEmpleadoModel($datosController, $tabla) {
            // Validar usuario repetido
            $send = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cedula=:ci");
            $send->bindParam(':ci', $datosController["cedula"], PDO::PARAM_STR);
            $send->execute();
            $count = $send->rowCount();

            if ($count == 0) {
                // INGRESAR LAS PATOLOGIAS SELECCIONADAS DEL PACIENTE
                    foreach((array) $datosController["seleccion"] as $rows => $datas) {
                        $cell = Conexion::conectar()->prepare("INSERT INTO patologias_pacientes (id_pacientes, id_patologias, id_estado) 
                                                                        VALUES (2, '$datas', 1)");
                        $cell->execute();
                    }
                    
                // INGRESAR LAS PATOLOGIAS SELECCIONADAS DEL PACIENTE - FAMILIARES
                    foreach((array) $datosController["fam"] as $rowse => $dataset) {
                        $fam = Conexion::conectar()->prepare("INSERT INTO patologias_familiares (id_pacientes, id_patologias, id_estado) 
                                                                        VALUES (2, '$dataset', 1)");
                        $fam->execute();
                    }
                    
                $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla 
                                (cedula, nombres, apellidos, fecha_nac, correo, direccion,
                                    telefono, celular1, celular2, id_estado,neuro, alergia)
                                
                                VALUES (:ci,:na,:la, :fn, :ma, :dir, :tel, :cel1, :cel2, :std, :neu, :ale)");
                $stmt->bindParam(":ci", $datosController["cedula"],         PDO::PARAM_STR);
                $stmt->bindParam(":na", $datosController["nombres"],        PDO::PARAM_STR);
                $stmt->bindParam(":la", $datosController["apellidos"],      PDO::PARAM_STR);
                $stmt->bindParam(":fn", $datosController["nac"],            PDO::PARAM_STR);
                $stmt->bindParam(":ma", $datosController["correo"],         PDO::PARAM_STR);
                $stmt->bindParam(":dir", $datosController["direccion"],     PDO::PARAM_STR);
                
                $stmt->bindParam(":tel", $datosController["telefono"],      PDO::PARAM_STR);
                $stmt->bindParam(":cel1", $datosController["celular1"],     PDO::PARAM_STR);
                $stmt->bindParam(":cel2", $datosController["celular2"],     PDO::PARAM_STR);
                $stmt->bindParam(":std", $datosController["estado"],        PDO::PARAM_INT);
                
                $stmt->bindParam(":neu", $datosController["neuro"],        PDO::PARAM_STR);
                $stmt->bindParam(":ale", $datosController["alergia"],        PDO::PARAM_STR);

                if($stmt->execute()) {
                    
                    
                    return "success";
                }else{
                    return "Error";
                }
            }else{
                return "Error";
            }

            $stmt->close();
        }

        public static function vistaEmpleadoModel($tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_estado=1 ORDER BY id_pacientes DESC");
            $stmt->execute();
            return $stmt->fetchAll();

            $stmt->close();
        }

        /** EDITAR USUARIO MODEL */

        public static function editEmpleadoModel($datosController, $tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_pacientes=:id");
            $stmt->bindParam(':id', $datosController, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }

        /** ACTUALIZAR DATOS DEL USUARIO MODEL */

        public static function actualizarEmpleadoModel($datosController, $tabla){
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cedula=:ci, nombres=:nom, apellidos=:ap, 
                                                                    fecha_nac=:fn, correo=:co, direccion=:dir,
                                                                    telefono=:tel, celular1=:cel1, celular2=:cel2
                                                                    
                                                                    WHERE id_pacientes=:id");
                                                                    
            $stmt->bindParam(':ci',     $datosController['cedula'], PDO::PARAM_STR);
            $stmt->bindParam(':nom',    $datosController['nombres'], PDO::PARAM_STR);
            $stmt->bindParam(':ap',     $datosController['apellido'], PDO::PARAM_STR);
            $stmt->bindParam(':fn',     $datosController['fecha_'], PDO::PARAM_STR);
            $stmt->bindParam(':co',     $datosController['correo'], PDO::PARAM_STR);
            $stmt->bindParam(':dir',    $datosController['direccion'], PDO::PARAM_STR);
            $stmt->bindParam(':tel',    $datosController['telefono'], PDO::PARAM_STR);
            $stmt->bindParam(':cel1',   $datosController['celular1'], PDO::PARAM_STR);
            $stmt->bindParam(':cel2',   $datosController['celular2'], PDO::PARAM_STR);
            
            
            $stmt->bindParam(':id', $datosController['id'], PDO::PARAM_INT);

            if( $stmt->execute() ){
                return "success";
            }else{
                return "error";
            }

            $stmt->close();
        }

        /** BORRAR USUARIO MODEL */ 
        public static function actualizarAfiModel($datosController, $tabla){
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_estado=2 WHERE id_pacientes=:id");            
            
            $stmt->bindParam(':id', $datosController['id'], PDO::PARAM_INT);

            if( $stmt->execute() ){
                return "success";
            }else{
                return "error";
            }

            $stmt->close();
        }
    }