<?php
    require_once ("model/model_usuario.php");
	require_once ("model/m_afiliacion_pacientes.php");
    require_once ("model/m_examenf.php");
    require_once ("model/m_prescripcion.php");
    
	class MvcController {
        
		public function plantilla() {
			include "view/template.php";
		}

		# Enlazar paginas en plantilla origen
		public function enlacesPaginasController() {
			if ( isset($_GET['action']) ) {
				$enlaceController = $_GET['action'];
			} else{
				$enlaceController = "log";
			}

			$respuesta = EnlacesPaginas::EnlacesPaginasModel($enlaceController);

			include $respuesta;
		}

		/*public function registroUsuarioController() {
			if(isset($_POST["usuario"])){
				$datosController = array("usuario"	=> $_POST["usuario"],
										 "passw" 	=> $_POST["passw"],
										 "email" 	=> $_POST["email"]);

				$response = Data::registroUsuarioModel($datosController, "usuarios");
				if ($response == "success") {
					echo '<div class="alert alert-success">
							<p><b><i class="fa fa-check"></i> El empleado ha sido registrado exitosamente.</b></p>
						  </div>';
						
				}else{
					echo 
					'<div class="alert alert-danger">
						<p><b>Error, al registrar al nuevo empleado.</b></p>
				  	 </div>';
				}
			}
		}*/
        
        public function registroUsuarioController() {
			if(isset($_POST["usuario"])){
				$datosController = array("usuario"	=> $_POST["usuario"],
										 "passw" 	=> $_POST["passw"],
										 "email" 	=> $_POST["email"]);

				$response = Data::registroUsuarioModel($datosController, "usuarios");
				if ($response == "success") {
					echo '<div class="alert alert-success">
							<p><b><i class="fa fa-check"></i> El empleado ha sido registrado exitosamente.</b></p>
						  </div>';
						
				}else{
					echo 
					'<div class="alert alert-danger">
						<p><b>Error, al registrar al nuevo empleado.</b></p>
				  	 </div>';
				}
			}
		}

		public function ingresoUsuarioController() {
			if(isset($_POST["email"])) {
				$datosController = array("email" => $_POST["email"],
										 "passw" => $_POST["passw"],
                                         "tipo" => $_POST["tipo"]);

				$response = Data::ingresoUsuarioModel($datosController, "usuarios");

				$intentos = $response["intentos"];
				$usuario = $_POST["email"];
				$max_intentos = 2;

				if ($intentos < $max_intentos) {
					if($response["correo"] == $_POST["email"] && $response["clv"] == $_POST["passw"]){
						//header("Location: index.php?action=usuarios");
						@session_start();
						$_SESSION["validar"] = true;
						$_SESSION["correo"] = $response["correo"];
                        $_SESSION["rol"] = $response["nombre_rol"];
                        $_SESSION["tipo"] = $_POST["tipo"];
                        $_SESSION["passw"] = $_POST["passw"];
                        $_SESSION["laid"] = $response["id_usuario"];
						$intentos = 0;
						$datosController = array("usuarioActual" => $usuario, "actualizarIntentos" => $intentos);
						$respuestaActualizarIntentos = Data::intentosUsuarioModel($datosController, "usuarios");
                        
                        $space = $_POST['tipo'];
                        switch ($space) {
                            case 1:
                                echo '<script>window.location.href="inicio";</script>';
                                break;
                                
                            case 2:
                                echo '<script>window.location.href="user";</script>';
                                break;       
                        }
                        // Verificar que rol tiene el usuario
                        
						
					}else{
						++$intentos;
						$datosController = array("usuarioActual" => $usuario, "actualizarIntentos" => $intentos);
						$respuestaActualizarIntentos = Data::intentosUsuarioModel($datosController, "usuarios");
						echo '<script>window.location.href="fail";</script>';
					}
				}else{
					$intentos = 0;
					$datosController = array("usuarioActual" => $usuario, "actualizarIntentos" => $intentos);
					$respuestaActualizarIntentos = Data::intentosUsuarioModel($datosController, "usuarios");
					echo '<script>window.location.href="fail3";</script>';
				}
			}
		}

		

		public function vistaUsuarioController(){
			$response = Data::vistaUsuarioModel("usuarios");			
			
			foreach((array) $response as $row => $items) {
				echo '<tr>
						<td>'.$items['id'].'</td>
						<td>'.$items['usuario'].'</td>
						<td>'.$items['email'].'</td>
						<td>'.$items['fecha'].'</td>
						<td><a href="index.php?action=editar&id='.$items['id'].'"><button>Editar</button></a></td>
						<td><a href="index.php?action=usuarios&idBorrar='.$items['id'].'"><button>Eliminar</button></a></td>
					  </tr>';
			}
		}

		/** AJAX - VALIDAR USUARIO CONTROLLER */

		public function validarUsuarioController($validate) {
			$datosController = $validate;
			$response = Data::validarUsuarioModel($datosController, "usuarios");
			if (count($response["correo"]) > 0 ){
				echo 0;
			}else{
				echo 1;
			}
		}
	}