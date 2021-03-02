<?php

    //require_once ("model/model_hrm_eply.php");
    
    class HRMControllerEply {
        public static function registroEmpleadoController() {
			if(isset($_POST["cedula"])){
				$datosController = array("cedula"		=> $_POST["cedula"],
										 "nombres" 		=> $_POST["nombres"],
										 "apellidos" 	=> $_POST["apellidos"],
										 "nac" 			=> $_POST["nac"],
										 "correo" 		=> $_POST["correo"],
                                         "direccion"	=> $_POST["direccion"],
										 "telefono"		=> $_POST["telefono"],
										 "celular1" 	=> $_POST["celular1"],
                                         "celular2" 	=> $_POST["celular2"],
                                         "estado"	    => $_POST["estado"],
                                         "seleccion"    => $_POST["seleccionados"],
                                         "fam"          => $_POST["fam"],
                                         "neuro"        => $_POST["neuro"],
                                         "alergia"      => $_POST["alergia"]);
                                         
				$response = AfiliacionPacienteModel::registroEmpleadoModel($datosController, "pacientes");
				if ($response == "success") {
					echo '<div class="alert alert-success">
							<p><b><i class="fa fa-check"></i> El paciente ha sido registrado exitosamente.</b></p>
						  </div>';

						  
				}else{
					echo 
					'<div class="alert alert-danger">
						<p><b>Error, al registrar al nuevo paciente.</b></p>
				  	 </div>';
				}
			}
		}
        
        public static function vistaEmpleadoController(){
			$response = AfiliacionPacienteModel::vistaEmpleadoModel("pacientes");		
			
			foreach((array) $response as $row => $items) {
				echo '<tr>
						<td>'.$items['id_pacientes'].'</td>
						<td>'.$items['cedula'].'</td>
						<td>'.$items['nombres'].' '.$items['apellidos'].'</td>
						<td>'.$items['correo'].'</td>
						<td>'.$items['telefono'].'</td>
						<td>'.$items['celular1'].'</td>
						<td><a class="btn btn-info" href="index.php?action=editar&id='.$items['id_pacientes'].'"><i class="fa fa-edit"></i></a></td>
						<td><a class="btn btn-danger" href="index.php?action=borrar_afi&id='.$items['id_pacientes'].'"><i class="fa fa-trash"></i></a></td>
					  </tr>';
			}
		}

		
		public static function editEmpleadoController() {
			$datosController = $_GET["id"];
			$response = AfiliacionPacienteModel::editEmpleadoModel($datosController, "pacientes");

			echo '
			<div class="form-row">
			<div class="form-group">
				<label for="" class="col-md-4">Cédula (*)</label>
				<div class="col-md-8">
					<input type="hidden" name="idEditar" class="form-control" value="'.$response['id_pacientes'].'">
					<input type="text" class="form-control" name="cedula" value="'.$response['cedula'].'" placeholder="Cédula o RUC" onkeypress="return numeros(event)">
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group">
				<label for="" class="col-md-4">Nombres (*)</label>
				<div class="col-md-8">
					<input class="form-control" name="nombres" placeholder="Nombres de empleado" value="'.$response['nombres'].'" onkeypress="return caracteres(event)">
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group">
				<label for="" class="col-md-4">Apellidos (*)</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="apellidos" placeholder="Apellidos de empleado" value="'.$response['apellidos'].'" onkeypress="return caracteres(event)">
				</div>
			</div>
		</div>                            
		<div class="form-row">
			<div class="form-group">
				<label for="" class="col-md-4">Fecha Nacimiento </label>
				<div class="col-md-8">
					<input type="date" name="nac" class="form-control" value="'.$response['fecha_nac'].'">
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group">
				<label for="" class="col-md-4">Correo Electrónico </label>
				<div class="col-md-8">
					<input type="email" class="form-control" name="correo" placeholder="correo" value="'.$response['correo'].'">
				</div>
			</div>
		</div>
        
        <div class="form-row">
			<div class="form-group">
				<label for="" class="col-md-4">Dirección</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="direccion" placeholder="Dirección completa" value="'.$response['direccion'].'">
				</div>
			</div>
		</div>
        
        <div class="form-row">
			<div class="form-group">
				<label for="" class="col-md-4">Teléfono</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="telefono" placeholder="Número de teléfono convencional" value="'.$response['telefono'].'" onkeypress="return numeros(event)">
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group">
				<label for="" class="col-md-4">Celular 1</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="celular1" placeholder="Celular 1" value="'.$response['celular1'].'" onkeypress="return numeros(event)">
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group">
				<label for="" class="col-md-4">Celular 2</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="celular2" placeholder="Celular 2" value="'.$response['celular2'].'" onkeypress="return numeros(event)">
				</div>
			</div>
		</div>

		
		
		<a href="afiliacion_pacientes" class="btn btn-success" style="float:right">Volver</a>
		<input type="submit" class="btn btn-info" value="Actualizar">
		<input type="reset" class="btn btn-warning" value="Cancelar">
				 ';
		}

		/** ACTUALIZAR DATOS DEL USUARIO */

		public static function actualizarEmpleadoController(){
			if (isset($_POST['cedula'])){
				$datosController = array(	"id" 		=> $_POST["idEditar"],
											"cedula"	=> $_POST["cedula"],
											"nombres" 	=> $_POST['nombres'],
											"apellido" 	=> $_POST['apellidos'],
											"fecha_" 	=> $_POST['nac'],
											"correo" 	=> $_POST['correo'],
											"direccion"	=> $_POST['direccion'],
                                            "telefono"	=> $_POST['telefono'],
											"celular1"	=> $_POST['celular1'],
                                            "celular2"	=> $_POST['celular2']);
				$response = AfiliacionPacienteModel::actualizarEmpleadoModel($datosController, "pacientes");
				if ($response == "success") {
					//header("Location: cambio");
					//echo '<script>window.location.href="cambio";</script>';
					echo '<div class="alert alert-success">
							<p><b><i class="fa fa-check"></i> Se ha actualizado la información del paciente.</b></p>
						  </div>';
					//echo '<script>window.location.href="afiliacion_pacientes";</script>';
				}else{
					echo "Error";
				}
			}
		}
        
        public static function eliAfiliadosController() {
			$datosController = $_GET["id"];
			$response = AfiliacionPacienteModel::editEmpleadoModel($datosController, "pacientes");

			echo '
			<div class="form-row">
    			<div class="form-group">
    				<label for="" class="col-md-4">Cédula (*)</label>
    				<div class="col-md-8">
    					<input type="hidden" name="idEditar" class="form-control" value="'.$response['id_pacientes'].'">
    					<input type="text" class="form-control" name="cedula" value="'.$response['cedula'].'" placeholder="Cédula o RUC" onkeypress="return numeros(event)" readonly="">
    				</div>
    			</div>
    		</div>
    		<div class="form-row">
    			<div class="form-group">
    				<label for="" class="col-md-4">Nombres (*)</label>
    				<div class="col-md-8">
    					<input class="form-control" name="nombres" placeholder="Nombres de empleado" value="'.$response['nombres'].'" onkeypress="return caracteres(event)" readonly="">
    				</div>
    			</div>
    		</div>
    		<div class="form-row">
    			<div class="form-group">
    				<label for="" class="col-md-4">Apellidos (*)</label>
    				<div class="col-md-8">
    					<input type="text" class="form-control" name="apellidos" placeholder="Apellidos de empleado" value="'.$response['apellidos'].'" onkeypress="return caracteres(event)" readonly="">
    				</div>
    			</div>
    		</div>		
    		
    		<a href="afiliacion_pacientes" class="btn btn-success" style="float:right">Volver</a>
    		<input type="submit" class="btn btn-danger" value="Eliminar">
    		<input type="reset" class="btn btn-warning" value="Cancelar">';
		}

		/** BORRAR USUARIO CONTROLLER */
        public static function actualizarAfiController(){
			if (isset($_POST['cedula'])){
				$datosController = array(	"id" 		=> $_POST["idEditar"]);
				$response = AfiliacionPacienteModel::actualizarAfiModel($datosController, "pacientes");
				if ($response == "success") {
					//header("Location: cambio");
					//echo '<script>window.location.href="cambio";</script>';
					echo '<div class="alert alert-success">
							<p><b><i class="fa fa-check"></i> Se ha eliminado la información correctamente.</b></p>
						  </div>';
					//echo '<script>window.location.href="afiliacion_pacientes";</script>';
				}else{
					echo "Error";
				}
			}
		}
    }