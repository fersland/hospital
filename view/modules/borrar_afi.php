
<?php
    if (!$_SESSION["validar"] == true) {
        header("Location: log");
        exit();
      }
    require_once ("controller/c_afiliacion_pacientes.php");
    $register = new HRMControllerEply(); ?>
<div class="row" style="margin-top:50px">
<div class="col-md-12">
<h2 class="title-render"> <i class="fa fa-user"></i> AFILIACI&Oacute;N / Eliminar información</h2><hr />
<?php  ?></div>
    
<div class="col-lg-6">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <i class="fa fa-list"></i> Eliminar Datos<br />
        </div>
            <div class="panel-body">
            <div class="col-sm-12 col-md-12">
            
                        <br />
                    
                    <?php $register->actualizarAfiController(); ?>    
                <hr>
            <form class="form-horizontal" method="post">
                <?php $register->eliAfiliadosController(); ?>
            </form>
            </div><!-- FIN COL-MD-12-->
        </div>
    </div>
</div>
<div class="col-lg-4">
</div>

</div>