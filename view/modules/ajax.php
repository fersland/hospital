<?php
    require_once ("../../controller/controller.php");
    require_once ("../../model/model_usuario.php");

    class Ajax {
        public $validarUsuario;
        public function validarUsuarioAjax() {
            $datos = $this->validarUsuario;
            $response = MvcController::validarUsuarioController($datos);

            echo $response;
        }
    }

    $a = new Ajax;
    $a->validarUsuario = $_POST["validarUsuario"];
    $a->validarUsuarioAjax();