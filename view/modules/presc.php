<?php

    if (!$_SESSION["validar"] == true) {
        header("Location: log");
        exit();
      }
    require_once ("controller/general_controller.php");
    require_once ("controller/c_prescripcion.php");
    $view = new PrescripcionController;
    $general = new General;
?>

<div class="row">
<div class="col-md-12" style="margin-top: -10px;">
<h2 class="title-render"> <i class="fa fa-user"></i> PRESCRIPCION / Examenes complementarios / 
    <button class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-check"></i> Nuevo
    </button></h2><hr />
<?php 
    $view->registroPrescripcionController(); 
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
    <div class="panel panel-danger">
        <div class="panel-heading">
            <strong><i class="fa fa-th-list"></i> Lista de Examenes : Buscar por categorias</strong>
        </div>
          
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="eco">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cédula</th>
                        <th>Paciente</th>
                        <th>Examen</th>
                        <th>Descripcion</th>
                        <th>Fecha Examen</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <body>
                    <?php
                        $view->vistaPrescripcionEcoController();
                       
                        //$view->borrarEmpleadoController();
                    ?>
                    </body>
                    </table>
                </div>
            </div>
            </div><!-- /.panel-body -->
        </div>
    </div><!-- /.col 12 -->
</div> <!-- /.row -->
    

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Formulario de registro (Prescripci&oacute;n)</h4>
                    </div>
                    <div class="modal-body" style="height: 400px;overflow-y: auto;">
                    

<!-- INICIO DEL FORMULARIO -->
        <form class="form-horizontal" method="post">
        <div class="alert alert-success">
            <p><b> Prescripci&oacute;n M&eacute;dica</b></p>
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
                    <label for="" class="col-md-4">Descripci&oacute;n</label>
                    <div class="col-md-8">
                        <textarea rows="7" class="form-control" name="desc" placeholder="M&aacute;ximo 600 Car&aacute;cteres" ></textarea>
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
