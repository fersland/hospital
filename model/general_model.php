<?php
    /************************************************
        Fecha: 7/12/2019
        Desarrollado por: Fernando Reyes N
        Para: ProyectosRender
    *************************************************/
    
    require_once ("class_cc.php");

    class DataGeneral {
        public static function estadoModel($tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();

            $stmt->close();
        }
        
        public static function patologiasModel($tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_estado=1");
            $stmt->execute();
            return $stmt->fetchAll();

            $stmt->close();
        }
        
        public static function listaPacientesModel($tabla) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_estado=1");
            $stmt->execute();
            return $stmt->fetchAll();

            $stmt->close();
        }
        
        public static function contadorPacienteModel($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            $cant = $stmt->rowCount();

            return $cant;
            $stmt->close();
        }
    }