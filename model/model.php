<?php 

	class EnlacesPaginas {

		public static function EnlacesPaginasModel($enlacesModel) {
			if ( 
				 $enlacesModel == "inicio" ||
                 $enlacesModel == "presc" ||
                 $enlacesModel == "presc_editar" ||
                 $enlacesModel == "presc_borrar" ||
				 $enlacesModel == "afiliacion_pacientes" ||
                 $enlacesModel == "log" ||                 
				 $enlacesModel == "examenf" ||
                 $enlacesModel == "examenf_editar" ||
                 $enlacesModel == "examenf_borrar" ||                 
				 $enlacesModel == "cerrar" ||
                 $enlacesModel == "backup" ||  
				 $enlacesModel == "editar" ||
                 $enlacesModel == "borrar_afi") {
			
				$module = "view/modules/".$enlacesModel . ".php";

			} else if ($enlacesModel == "index") {
				$module = "view/modules/afiliacion_pacientes.php";

			} else if ($enlacesModel == "ok"){
				$module = "view/modules/afiliacion_pacientes.php";
				
			}else if($enlacesModel == "fail") {
				$module = "view/modules/log.php";

			}else if($enlacesModel == "fail3") {
				$module = "view/modules/log.php";

			}else if ($enlacesModel == "cambio"){
				$module = "view/modules/afiliacion_pacientes.php";

			}else {
				$module = "view/modules/afiliacion_pacientes.php";
			}

			return $module;
		}
	}