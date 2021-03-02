<?php

    //require_once ("model/model_hrm_eply.php");
    
    class PrescripcionController {
        public static function registroPrescripcionController() {
			if(isset($_POST["paciente"])){
				$datosController = array("paciente"		   => $_POST["paciente"],
										 "categoria" 	   => $_POST["categoria"],
                                         "desc" 		   => $_POST["desc"]);
                                         
				$response = PrescripcionModel::registroPrescripcionModel($datosController, "prescripcion");
				if ($response == "success") {
					echo '<div class="alert alert-success">
							<p><b><i class="fa fa-check"></i> Se ha guardado exitosamente.</b></p>
						  </div>';

						  
				}else{
					echo 
					'<div class="alert alert-danger">
						<p><b>Error, al registrar.</b></p>
				  	 </div>';
				}
			}
		}
        
        public static function vistaPrescripcionEcoController(){
			$response = PrescripcionModel::vistaPrescripcionEcosModel("prescripcion");		
		
			foreach((array) $response as $row => $items) {
				echo '<tr>
						<td>'.$items['id_presc'].'</td>
						<td>'.$items['cedula'].'</td>
						<td>'.$items['el_paciente'].'</td>
                        <td>'.$items['categoria'].'</td>
                        <td>'.$items['descripcion'].'</td>
						<td>'.$items['fecha'].'</td>
						<td><a class="btn btn-info" href="index.php?action=presc_editar&id='.$items['id_presc'].'"><i class="fa fa-edit"></i></a></td>
						<td><a class="btn btn-danger" href="index.php?action=presc_borrar&id='.$items['id_presc'].'"><i class="fa fa-trash"></i></a></td>
				    </tr>';
			}            
		}

		
		public static function editPrescripcionController() {
			$datosController = $_GET["id"];
			$response = PrescripcionModel::editPrescripcionModel($datosController, "prescripcion");

			echo '<input type="hidden" name="idEditar" class="form-control" value="'.$response['id_presc'].'">
					
		      <div class="form-group">
                <label for="" class="col-md-4">Seleccione Categoria: </label>
                <div class="col-md-8">
                        <select class="form-control" name="categoria">
                            <option>Radiografias</option>
                            <option>Ecografias</option>
                            <option>Fisiatria</option>
                            <option>Ortopedia</option>
                            <option>Ginecologia</option>
                            <option>Cardiologia</option>
                            <option>Oftalmologia</option>
                            <option>Traumatologia</option>
                        </select>
                    </div>
            </div>
                                           
            <div class="form-group">
                    <label for="" class="col-md-4">Descripción</label>
                    <div class="col-md-8">
                        <textarea rows="7" class="form-control" name="desc" placeholder="Máximo 600 Carácteres" >'.$response['descripcion'].'</textarea>
                    </div>
            </div>

		
		
		<a href="presc" class="btn btn-success" style="float:right">Volver</a>
		<input type="submit" class="btn btn-info" value="Actualizar">
		<input type="reset" class="btn btn-warning" value="Cancelar">
				 ';
		}

		/** ACTUALIZAR DATOS DEL USUARIO */

		public static function actualizarPrescripcionController(){
			if (isset($_POST['categoria'])){
				$datosController = array(	"id" 		 => $_POST["idEditar"],
											"categoria"	 => $_POST["categoria"],
											"desc" 	     => $_POST['desc']);
				$response = PrescripcionModel::actualizarPrescripcionModel($datosController, "prescripcion");
				if ($response == "success") {
					//header("Location: cambio");
					//echo '<script>window.location.href="cambio";</script>';
					echo '<div class="alert alert-success">
							<p><b><i class="fa fa-check"></i> Se ha actualizado la información de la prescripcion.</b></p>
						  </div>';
					//echo '<script>window.location.href="afiliacion_pacientes";</script>';
				}else{
					echo "Error";
				}
			}
		}

		/** BORRAR PRESCRIPCION CONTROLLER */

		public static function eliPrescripcionController() {
			$datosController = $_GET["id"];
			$response = PrescripcionModel::eliPrescripcionModel($datosController, "prescripcion");

			echo '<input type="hidden" name="idEditar" class="form-control" value="'.$response['id_presc'].'">
					
		      <div class="form-group">
                <label for="" class="col-md-4">Seleccione Categoria: </label>
                <div class="col-md-8">
                        <select class="form-control" name="categoria" readonly="">
                            <option>Radiografias</option>
                            <option>Ecografias</option>
                            <option>Fisiatria</option>
                            <option>Ortopedia</option>
                            <option>Ginecologia</option>
                            <option>Cardiologia</option>
                            <option>Oftalmologia</option>
                            <option>Traumatologia</option>
                        </select>
                    </div>
            </div>
                                           
            <div class="form-group">
                    <label for="" class="col-md-4">Descripción</label>
                    <div class="col-md-8">
                        <textarea readonly="" rows="7" class="form-control" name="desc" placeholder="Máximo 600 Carácteres" >'.$response['descripcion'].'</textarea>
                    </div>
            </div>

		
		
		<a href="presc" class="btn btn-success" style="float:right">Volver</a>
		<input type="submit" class="btn btn-danger" value="Eliminar">
		<input type="reset" class="btn btn-warning" value="Cancelar">
				 ';
		}

		/** ACTUALIZAR DATOS DE LA PRESCRIPCION */

		public static function eliminarPrescripcionController(){
			if (isset($_POST['idEditar'])){
				$datosController = array(	"id" 		 => $_POST["idEditar"]);
				$response = PrescripcionModel::eliminarPrescripcionModel($datosController, "prescripcion");
				if ($response == "success") {
					//header("Location: cambio");
					//echo '<script>window.location.href="cambio";</script>';
					echo '<div class="alert alert-success">
							<p><b><i class="fa fa-check"></i> Se ha eliminado la prescripcion.</b></p>
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