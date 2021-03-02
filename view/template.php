<?php include ("default/header.php"); ?>

<div id="page-wrapper" style="margin-top:50px">
<?php //include ("default/jumbo.php");
    require_once ("controller/controller.php");
	$mvc = new MvcController();
	$mvc -> enlacesPaginasController();
?>

</div>

<script src="view/js/validateRegister.js"></script>
<?php include ("default/footer.php"); ?>