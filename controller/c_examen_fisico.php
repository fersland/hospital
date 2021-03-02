<?php

    //require_once ("model/model_hrm_eply.php");
    
    class ExamenFisicoController {
        public static function registroExamenFisicoController() {
			if(isset($_POST["paciente"])){
				$datosController = array("paciente"		   => $_POST["paciente"],
										 "cabeza" 	       => $_POST["cabeza"],
                                         "torax" 		   => $_POST["torax"],
										 "abdomen" 		   => $_POST["abdomen"],
										 "extremidades"    => $_POST["extremidades"]);
                                         
				$response = ExamenFisicoModel::registroExamenFisico($datosController, "examen_fisico");
				if ($response == "success") {
					echo '<div class="alert alert-success">
							<p><b><i class="fa fa-check"></i> El examen físico ha sido registrado exitosamente.</b></p>
						  </div>';

						  
				}else{
					echo 
					'<div class="alert alert-danger">
						<p><b>Error, al registrar el exmane fisico.</b></p>
				  	 </div>';
				}
			}
		}
        
        public static function vistaExamenesController(){
			$response = ExamenFisicoModel::vistaExamenesModel("examen_fisico");		
			
			foreach((array) $response as $row => $items) {
				echo '<tr>
						<td>'.$items['id_examen'].'</td>
						<td>'.$items['cedula'].'</td>
						<td>'.$items['el_paciente'].'</td>
						<td>'.$items['fecha'].'</td>
						<td><a class="btn btn-info" href="index.php?action=examenf_editar&id='.$items['id_examen'].'"><i class="fa fa-edit"></i></a></td>
						<td><a class="btn btn-danger" href="index.php?action=examenf_borrar&id='.$items['id_examen'].'"><i class="fa fa-trash"></i></a></td>
					  </tr>';
			}
		}

		
		public static function editExamenController() {
			$datosController = $_GET["id"];
			$response = ExamenFisicoModel::editExamenModel($datosController, "examen_fisico");

			echo '

            
            <input type="hidden" name="idEditar" class="form-control" value="'.$response['id_examen'].'">

            <div class="form-group">
                    <label for="" class="col-md-4">Descripción de Cabeza </label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="cabeza" placeholder="Máximo 600 Carácteres" >'.$response['cabeza'].'</textarea>
                    </div>
            </div>
            <div class="form-group">
                    <label for="" class="col-md-4">Descripción de Torax </label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="torax" placeholder="Máximo 600 Carácteres" >'.$response['torax'].'</textarea>
                    </div>
            </div>
            <div class="form-group">
                
                    <label for="" class="col-md-4">Descripción Abdomen </label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="abdomen" placeholder="Máximo 600 Carácteres" >'.$response['abdomen'].'</textarea>
                    </div>
                
            </div>                            
            <div class="form-group">
                    <label for="" class="col-md-4">Descripción de extremidades inferiores y superiores</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="extremidades" placeholder="Máximo 600 Carácteres" >'.$response['extremidades'].'</textarea>
                    </div>
                </div>
		
		

		
		
		<a href="examenf" class="btn btn-success" style="float:right">Volver</a>
		<input type="submit" class="btn btn-info" value="Actualizar">
		<input type="reset" class="btn btn-warning" value="Cancelar">
				 ';
		}

		/** ACTUALIZAR DATOS DEL USUARIO */

		public static function actualizarExamenController(){
			if (isset($_POST['cabeza'])){
				$datosController = array(	"id" 		=> $_POST["idEditar"],
											"cabeza"	=> $_POST["cabeza"],
											"torax" 	=> $_POST['torax'],
											"abdomen" 	=> $_POST['abdomen'],
											"extremidades" 	=> $_POST['extremidades']);
				$response = ExamenFisicoModel::actualizareExamenModel($datosController, "examen_fisico");
				if ($response == "success") {
					//header("Location: cambio");
					//echo '<script>window.location.href="cambio";</script>';
					echo '<div class="alert alert-success">
							<p><b><i class="fa fa-check"></i> Se ha actualizado la información del examen.</b></p>
						  </div>';
					//echo '<script>window.location.href="afiliacion_pacientes";</script>';
				}else{
					echo "Error";
				}
			}
		}

		/** BORRAR EXAMEN CONTROLLER */
        public static function eliExamenController() {
			$datosController = $_GET["id"];
			$response = ExamenFisicoModel::eliExamenModel($datosController, "examen_fisico");

			echo '

            
            <input type="hidden" name="idEditar" class="form-control" value="'.$response['id_examen'].'">

            <div class="form-group">
                    <label for="" class="col-md-4">Descripción de Cabeza </label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="cabeza" placeholder="Máximo 600 Carácteres" readonly="">'.$response['cabeza'].'</textarea>
                    </div>
            </div>
            <div class="form-group">
                    <label for="" class="col-md-4">Descripción de Torax </label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="torax" placeholder="Máximo 600 Carácteres" readonly="">'.$response['torax'].'</textarea>
                    </div>
            </div>
            <div class="form-group">
                
                    <label for="" class="col-md-4">Descripción Abdomen </label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="abdomen" placeholder="Máximo 600 Carácteres" readonly="">'.$response['abdomen'].'</textarea>
                    </div>
                
            </div>                            
            <div class="form-group">
                    <label for="" class="col-md-4">Descripción de extremidades inferiores y superiores</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="extremidades" placeholder="Máximo 600 Carácteres" readonly="">'.$response['extremidades'].'</textarea>
                    </div>
                </div>
		
		

		
		
		<a href="examenf" class="btn btn-success" style="float:right">Volver</a>
		<input type="submit" class="btn btn-danger" value="Eliminar">
		<input type="reset" class="btn btn-warning" value="Cancelar">
				 ';
		}

		/** ACTUALIZAR DATOS DEL USUARIO */

		public static function eliminarExamenController(){
			if (isset($_POST['cabeza'])){
				$datosController = array(	"id" 		=> $_POST["idEditar"]);
				$response = ExamenFisicoModel::eliminarExamenModel($datosController, "examen_fisico");
				if ($response == "success") {
					//header("Location: cambio");
					//echo '<script>window.location.href="cambio";</script>';
					echo '<div class="alert alert-success">
							<p><b><i class="fa fa-check"></i> Se ha actualizado la información del examen.</b></p>
						  </div>';
					//echo '<script>window.location.href="afiliacion_pacientes";</script>';
				}else{
					echo "Error";
				}
			}
		}
		
        
        public static function estadisticasEmpleadoController(){
			$response = AfiliacionPacienteModel::estadisticasEmpleadoModel("pacientes");

			echo '<div class="panel panel-info">
			         <div class="panel-heading">
				        <div class="row">
        					<div class="col-xs-3">
        						<i class="fa fa-users fa-5x"></i>
        					</div>
        					<div class="col-xs-9 text-right">
        						<div class="huge">'.$response.'</div>
        						<div>Pacientes</div>
        					</div>
				        </div>
			         </div>

		          </div>';
		}
        
        public static function estadisticasEmpleado2Controller(){
			$response = AfiliacionPacienteModel::estadisticasEmpleadoModel("pacientes");

			echo '<div class="panel panel-warning">
			         <div class="panel-heading">
				        <div class="row">
        					<div class="col-xs-3">
        						<i class="fa fa-users fa-5x"></i>
        					</div>
        					<div class="col-xs-9 text-right">
        						<div class="huge">'.$response.'</div>
        						<div>Pacientes</div>
        					</div>
				        </div>
			         </div>

		          </div>';
		}
        
        public static function estadisticasEmpleado3Controller(){
			$response = AfiliacionPacienteModel::estadisticasEmpleadoModel("pacientes");

			echo '<div class="panel panel-success">
			         <div class="panel-heading">
				        <div class="row">
        					<div class="col-xs-3">
        						<i class="fa fa-users fa-5x"></i>
        					</div>
        					<div class="col-xs-9 text-right">
        						<div class="huge">'.$response.'</div>
        						<div>Pacientes</div>
        					</div>
				        </div>
			         </div>

		          </div>';
		}
    }