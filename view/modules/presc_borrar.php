<?php
    if (!$_SESSION["validar"] == true) {
        header("Location: log");
        exit();
      }
    require_once ("controller/c_prescripcion.php");
    $register = new PrescripcionController(); ?>
<div class="row" style="margin-top:50px">
<div class="col-md-12">
<h2 class="title-render"> <i class="fa fa-user"></i> PRESCRIPCION / Actualizar información</h2><hr />
<?php  ?></div>
    
<div class="col-lg-8">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <i class="fa fa-list"></i> Eliminar datos de la Prescripción<br />
        </div>
            <div class="panel-body">
            <div class="col-sm-12 col-md-12">
        <br />
                    
                    <?php $register->eliminarPrescripcionController(); ?>    
                <hr>
            <form class="form-horizontal" method="post">
                <?php $register->eliPrescripcionController(); ?>
            </form>
            </div><!-- FIN COL-MD-12-->
        </div>
    </div>
</div>
<div class="col-lg-4">
</div>
</div>