<?php
	require_once ("model/general_model.php");
	class General {
	   
       /***************************************
            LISTA DE ESTADO - ACTIVO/INACTIVO
        ****************************************/
		public static function estadoController(){
			$response = DataGeneral::estadoModel("estado");		
			
			foreach((array) $response as $row => $items) {
				echo '<option value="'.$items['id_estado'].'">'.$items['nombre'].'</option>';
			}
		}
        
        /***************************************
            LISTA DE PATOLOGIAS DEL PACIENTE
        ****************************************/
        
        public static function patologiasController() {
            $response = DataGeneral::patologiasModel("patologias");
            
            foreach((array) $response as $row => $items) { ?>
                
                <label class="conta"><input type="checkbox" name="seleccionados[]" value="<?php echo $items['id_patologias'] ?>"> <?php echo $items['nombre_patologia'] ?><span class="checkmark"></span></label> 
                <?php
            }
        }
        
        /***************************************
            LISTA DE PATOLOGIAS FAMILIARES
        ****************************************/
        
        public static function patologiasFamiliaresController() {
            $response = DataGeneral::patologiasModel("patologias");
            
            foreach((array) $response as $row => $items) { ?>
                
                <label class="conta"><input type="checkbox" name="fam[]" value="<?php echo $items['id_patologias'] ?>"> <?php echo $items['nombre_patologia'] ?><span class="checkmark"></span></label> 
                <?php
            }
        }
        
        /***************************************
            LISTA DE PACIENTES
        ****************************************/
        
        public static function listaPacientesController() {
            $response = DataGeneral::listaPacientesModel("pacientes");
            
            foreach((array) $response as $row => $items) { ?>
                <option value="<?php echo $items['id_pacientes'] ?>"><?php echo $items['nombres']. ' '.$items['apellidos'] ?></option> 
                <?php
            }
        }
        
        
        /***************************************
            ESTADISTICAS PARA EL DASHBOARD
        ****************************************/
        
        public static function contadorPacienteController(){
			$response = DataGeneral::contadorPacienteModel("pacientes");

			echo '<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">'.$response.'</div>
                                    <div>Consultas!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>';
		}
    }