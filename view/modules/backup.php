<?php
    if (!$_SESSION["validar"] == true) {
        header("Location: log");
        exit();
      }
    require_once ("controller/general_controller.php");
    require_once ("controller/c_afiliacion_pacientes.php");
    $view = new HRMControllerEply;
    $general = new General;    
?>
<div class="row">
<div class="col-md-12">
<h2 class="title-render"> <i class="fa fa-user"></i> ADMINISTRACIÓN / BackUp
            </button></h2><hr />
<?php 

    $view->registroEmpleadoController(); 
    if (isset($_GET["action"])){
        if ($_GET["action"] == "ok"){
            echo "Registro exitoso";
        }

        if ($_GET["action"] == "cambio"){
            echo "Actualizado correctamente";
            
            //echo '<script>window.location.href="rrhh_eply";</script>';
        }
    }
?>
</div>
</div>


<div class="row">
<div class="col-lg-12">
    <div class="panel panel-success">
        <div class="panel-heading">
            <i class="fa fa-list"></i> LISTA DE TABLAS DEL SISTEMA: Seleccione para generar el respaldo.<br />
        </div>
            <div class="panel-body">
            <div class="col-sm-12 col-md-12">
<?php
require_once ("model/class_cc.php");
$env = new Conexion;
$db = $env->conectar();

$get_all_table_query = "SHOW TABLES";
$statement = $db->prepare($get_all_table_query);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

?>



<form method="post" id="export_form" action="controller/back.php">
     <h3>Selecione las tablas a exportar</h3>
    <?php
    foreach($result as $table)
    {
    ?>
     <div class="checkbox">
      <label class="conta"><input type="checkbox" class="checkbox_table" name="table[]" value="<?php echo $table["Tables_in_proyecto_serli"]; ?>" /> <span class="checkmark"></span> &nbsp;&nbsp;<?php echo $table["Tables_in_proyecto_serli"]; ?></label>
     </div>
    <?php
    }
    ?>
     <div class="form-group">
      <input type="submit" name="submit" id="submit" class="btn btn-danger" value="Exportar Ahora!" />
     </div>
</form>
            </div><!-- FIN COL-MD-12-->
        </div>
    </div>
</div>
</div>


</div>










<script>
$(document).ready(function(){
 $('#submit').click(function(){
  var count = 0;
  $('.checkbox_table').each(function(){
   if($(this).is(':checked'))
   {
    count = count + 1;
   }
  });
  if(count > 0)
  {
   $('#export_form').submit();
  }
  else
  {
   alert("Por favor, seleccione al menos una tabla para exportar");
   return false;
  }
 });
});
</script>