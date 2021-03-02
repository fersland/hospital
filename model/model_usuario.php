<?php
    require_once ("class_cc.php");

    class Data {
        public function registroUsuarioModel($datosController, $tabla) {
            // Validar usuario repetido
            $send = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario=:user");
            $send->bindParam(':user', $datosController["usuario"], PDO::PARAM_STR);
            $send->execute();
            $count = $send->rowCount();

            if ($count == 0) {
                $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, passw, email) VALUES (:us,:pa,:em)");
                $stmt->bindParam(":us", $datosController["usuario"],    PDO::PARAM_STR);
                $stmt->bindParam(":pa", $datosController["passw"],      PDO::PARAM_STR);
                $stmt->bindParam(":em", $datosController["email"],      PDO::PARAM_STR);

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

        

        public static function ingresoUsuarioModel($datosController, $tabla){
            $stmt = Conexion::conectar()->prepare("SELECT u.correo, u.clv, u.id_usuario, u.intentos, r.nombre_rol FROM $tabla u 
                                                        INNER JOIN roles r ON r.id_rol = u.rol
                                                        WHERE u.correo=:email AND u.clv=:passw AND r.id_rol = :tipo");
                                                        
            $stmt->bindParam(':email', $datosController["email"], PDO::PARAM_STR);
            $stmt->bindParam(':passw', $datosController["passw"], PDO::PARAM_STR);
            $stmt->bindParam(':tipo', $datosController["tipo"], PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch();

            $stmt->close();
        }

        /** INTENTOS USUARIO LOGIN */

        public static function intentosUsuarioModel($datosController, $tabla){
            $stmt = Conexion::conectar()->prepare("UPDATE usuarios SET intentos=:intentos WHERE correo=:email");
            $stmt->bindParam(':intentos', $datosController["actualizarIntentos"], PDO::PARAM_STR);
            $stmt->bindParam(':email', $datosController["usuarioActual"], PDO::PARAM_STR);

            if($stmt->execute()) {
                return "success";
            }else{
                return "error";
            }

            $stmt->close();
        }

        public function vistaUsuarioModel($tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT id, usuario, email, fecha FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();

            $stmt->close();
        }

        
        
        

        /** EDITAR USUARIO MODEL */

        public function editarUsuarioModel($datosController, $tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT id, usuario, email FROM $tabla WHERE id=:id");
            $stmt->bindParam(':id', $datosController, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }

        /** ACTUALIZAR DATOS DEL USUARIO MODEL */

        public function actualizarUsuarioModel($datosController, $tabla){
            $stmt = Conexion::conectar()->prepare("UPDATE usuarios SET usuario=:us, email=:em WHERE id=:id");
            $stmt->bindParam(':us', $datosController['usuario'], PDO::PARAM_STR);
            $stmt->bindParam(':em', $datosController['email'], PDO::PARAM_STR);
            $stmt->bindParam(':id', $datosController['id'], PDO::PARAM_INT);

            if( $stmt->execute() ){
                return "success";
            }else{
                return "error";
            }

            $stmt->close();
        }

        /** BORRAR USUARIO MODEL */ 

        public function borrarUsuarioModel($datosController, $tabla) {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");
            $stmt->bindParam(':id', $datosController, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "success";
            }else{
                return "error";
            }

            $stmt->close();
        }

        public function validarUsuarioModel($datos, $tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT usuario FROM $tabla WHERE usuario=:user");
            $stmt->bindParam(':user', $datos, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();

            $stmt->close();
        }
        
        public static function cambiarClaveModel($datosController, $tabla){
            $send = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE passw=:passw AND id=1");
            $send->bindParam(':passw', $datosController["ori"], PDO::PARAM_STR);
            $send->execute();
            $count = $send->rowCount();
    
            
            if ($count > 0) {
                $cl = $datosController["cla"];
                if ($datosController["cla"] == $datosController["rcla"]){
                    $stmt = Conexion::conectar()->prepare("UPDATE usuarios SET passw='$cl' WHERE id=1)");
                    $stmt->execute();
                        return "success";
                }else{
                    return "Error";
                }
            }else{
                return "Error";
            }
            $stmt->close();
        }
    }