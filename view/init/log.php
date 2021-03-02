<?php
    /*if (isset($_POST['login'])){
        if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['mail'])&&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST['passw']) ){

            $encriptar = crypt($_POST["passw"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            $modelo = new Sesion();
            $modelo->email      = htmlspecialchars(trim($_POST['mail']));
            $modelo->password   = $encriptar;
            $modelo->Sesion();                 
        }
    }*/
?>
<?php 
	session_start();
	if (@$_SESSION['login'] == true ) {
		
	}else{
		//session_unset();
		//session_destroy();

		//header('Location: ../init/log.php');
	}
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

  	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">MVC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
        	
         <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reg.php">REGISTRO</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid">
	<div class="row" style="background: url(../../resources/26.jpg)no-repeat; background-size: cover; min-height:800px">
		<div class="col-md-4 mx-auto"><br><br>
			<h1 align="center" class="mt-4">Iniciar Sesión</h1>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
	  <div class="form-group">
	    <label>Email address</label>
	    <input type="email" class="form-control" name="mail" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" name="passw" class="form-control" id="exampleInputPassword1" placeholder="Password">
	  </div>
	  <div class="form-check">
	    <input type="checkbox" class="form-check-input" id="exampleCheck1">
	    <label class="form-check-label" for="exampleCheck1">Check me out</label>
	  </div>
	  <button type="submit" name="login" class="btn btn-primary btn-block">Enviar</button>
	  <button type="reset" class="btn btn-warning btn-block">Cancelar</button>
	  <div class="alert alert-danger mt-4">
	  	<center><a href="reg.php" class="text-dark" style="font-weight: bold">Registrarse aquí</a></center>
	  </div>
	</form>
</div>
</div>
</div>
