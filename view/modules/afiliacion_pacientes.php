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
<h2 class="title-render"> <i class="fa fa-user"></i> AFILIACIÓN / Registro de Pacientes / <button class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-check"></i> Nuevo Paciente
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
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-list"></i> Lista de Pacientes<br />
        </div>
            <div class="panel-body">
            <div class="col-sm-12 col-md-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cédula</th>
                        <th>Nombres</th>
                        <th>Correo Electrónico</th>
                        <th>Teléfono</th>
                        <th>Celular</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody >
                    <?php
                        $view->vistaEmpleadoController();
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
                <div class="modal-content" style="width: 1200px;right: 300px;" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Formulario de registro (Paciente)</h4>
                    </div>
                    <div class="modal-body" style="height: 400px;overflow-y: auto;">
                    

<!-- INICIO DEL FORMULARIO -->
        <form class="form-horizontal" method="post">
        <div class="alert alert-success">
            <p><b> Datos personales del paciente</b></p>
            <p><b> Los campos con (*) son obligatorios</b></p>
        </div>
            <div class="form-group">
                
                    <input type="hidden" name="estado" value="1" />               
            
                
                    <label for="" class="col-md-2">Cédula (*)</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="cedula" placeholder="Cédula o RUC" onkeypress="return numeros(event)">
                    </div>

                    <label for="" class="col-md-2">Nombres Completos (*)</label>
                    <div class="col-md-2">
                        <input class="form-control" name="nombres" placeholder="Nombres de empleado" onkeypress="return caracteres(event)">
                    </div>
                
            
                
                    <label for="" class="col-md-2">Apellidos Completos (*)</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="apellidos" placeholder="Apellidos de empleado" onkeypress="return caracteres(event)">
                    </div>
                
            </div>                            
            <div class="form-group">
                    <label for="" class="col-md-2">Fecha Nacimiento (*)</label>
                    <div class="col-md-2">
                        <input type="date" name="nac" class="form-control" />
                    </div>
            
                    <label for="" class="col-md-2">Correo Electrónico (*)</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="correo" placeholder="correo">
                    </div>
            
                    <label for="" class="col-md-2">Dirección Completa</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="direccion" placeholder="Dirección completa">
                    </div>
                </div>
            
            
                <div class="form-group">
                    <label for="" class="col-md-2">Teléfono</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="telefono" placeholder="Teléfono de casa" onkeypress="return numeros(event)">
                    </div>
                    
                    <label for="" class="col-md-2">Celular 1</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="celular1" placeholder="Celular personal" onkeypress="return numeros(event)">
                    </div>

                    <label for="" class="col-md-2">Celular 2</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="celular2" placeholder="Celular personal" onkeypress="return numeros(event)">
                    </div>
                </div>
                <br /><br />
    <div class="alert alert-info"><b>ANTECEDENTES PATOLOGICOS PERSONALES</b></div>
        
        <?php $general->patologiasController(); ?>
        
        <br /><br />
    <div class="alert alert-warning">
        <b>ANTECEDENTES PATOLOGICAS FAMILIARES</b></div>
            <?php $general->patologiasFamiliaresController(); ?>
        
        <br /><br />
        
        
        <div class="alert alert-success">
        <b>ANTECEDENTES NEUROLÓGICOS</b></div>
        
        <label for="" class="col-md-3">Antecedentes Neurológicos</label>
        <div class="col-md-6">
            <textarea class="form-control" name="neuro" placeholder="Describa aquí, 800 Carácteres Máximo"></textarea>
        </div>
    <br /><br /><br /><br />
    
    <div class="alert alert-info">
        <b>ANTECEDENTES ALÉRGICOS</b></div>
        
        <label for="" class="col-md-3">Antecedentes Alérgicos</label>
        <div class="col-md-6">
            <textarea class="form-control" name="alergia" placeholder="Describa aquí, 800 Carácteres Máximo"></textarea>
        </div>
    <br /><br /><br /><br />
                                
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

</div>