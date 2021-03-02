<?php

    if (!$_SESSION["validar"] == true) {
        header("Location: log");
        exit();
      }
    require_once ("controller/general_controller.php");
    require_once ("controller/c_examen_fisico.php");
    $view = new ExamenFisicoController;
    $general = new General;
?>




<div class="row">
<div class="col-md-12">
<h2 class="title-render"> <i class="fa fa-user"></i> EXAMÉN FÍSICO / Registro Examén / <button class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-check"></i> Nuevo Examén
            </button></h2><hr />
<?php 

    $view->registroExamenFisicoController(); 
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
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-list"></i> Lista de Examenes físicos<br />
        </div>
            <div class="panel-body">
            <div class="col-sm-12 col-md-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cédula</th>
                        <th>Paciente</th>
                        <th>Fecha Examen</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody >
                    <?php
                        $view->vistaExamenesController();
                        //$view->borrarEmpleadoController();
                    ?>
                </tbody>
            </table>
            </div><!-- FIN COL-MD-12-->
        </div>
    </div>
</div>
</div>
    

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Formulario de registro (Examén Físico)</h4>
                    </div>
                    <div class="modal-body" style="height: 400px;overflow-y: auto;">
                    

<!-- INICIO DEL FORMULARIO -->
        <form class="form-horizontal" method="post">
        <div class="alert alert-success">
            <p><b> Examén Físico del Paciente</b></p>
        </div>
            <div class="form-group">
                <label for="" class="col-md-4">Seleccione el Paciente: </label>
                <div class="col-md-8">
                        <select class="form-control" name="paciente">
                            <?php $general->listaPacientesController(); ?>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                    <label for="" class="col-md-4">Descripción de Cabeza </label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="cabeza" placeholder="Máximo 600 Carácteres" ></textarea>
                    </div>
            </div>
            <div class="form-group">
                    <label for="" class="col-md-4">Descripción de Torax </label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="torax" placeholder="Máximo 600 Carácteres" ></textarea>
                    </div>
            </div>
            <div class="form-group">
                
                    <label for="" class="col-md-4">Descripción Abdomen </label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="abdomen" placeholder="Máximo 600 Carácteres" ></textarea>
                    </div>
                
            </div>                            
            <div class="form-group">
                    <label for="" class="col-md-4">Descripción de extremidades inferiores y superiores</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="extremidades" placeholder="Máximo 600 Carácteres" ></textarea>
                    </div>
                </div>
            
                <br /><br />    
            </div>
            <div class="modal-footer">
                <a href="index.php" class="btn btn-info" style="float:left">Salir</a>
                <button type="submit" class="btn btn-success" ><i class="fa fa-check"></i> Guardar Datos</button>
                <input type="reset" class="btn btn-warning" value="Cancelar">
            </div>
            </form>
        </div><!-- /.modal-content -->        
    </div> <!-- /.modal-dialog -->
</div><!-- FIN MODAL FADE-->
