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
        <a class="nav-link" href="log.php">LOGIN</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid">
	<div class="row" style="background: url(../../resources/39.jpg)no-repeat; background-size: cover; min-height:800px">
		<div class="col-md-4 mx-auto"><br><br>
			<h1 align="center" class="mt-4">Registro</h1>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Nombres</label>
	    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese sus nombres">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Apellidos</label>
	    <input type="text" name="last" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese sus apellidos">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Email address</label>
	    <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su correo electrónico">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" name="passw" class="form-control" id="exampleInputPassword1" placeholder="Ingresar clave">
	  </div>
	  <div class="form-check">
	    <input type="checkbox" class="form-check-input" id="exampleCheck1">
	    <label class="form-check-label" for="exampleCheck1">Check me out</label>
	  </div>
	  <button type="submit" name="succ" class="btn btn-primary btn-block">Enviar</button>
	  <button type="reset" class="btn btn-warning btn-block">Cancelar</button>
	  <a href="log.php" class="text-dark" style="font-weight: bold">Iniciar Sesión aquí</a>
	</form>

<?php
    require_once '../../model/class_cc.php';
    require_once '../../model/class_crud.php';
    
    $cc = new Conexion();
    $conexion = $cc->Open_Conexion();

// Consulto si ya existe el email que voy a registrar 0 | 1
   if ( isset($_POST['succ']) ) {
       if(preg_match('/^[a-zA-Z0-9]+$/', $_POST['passw'])) {
          if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['mail'])) {

            $encriptar = crypt($_POST["passw"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            $consulta = $conexion->prepare("SELECT COUNT(*) AS verificado FROM usuario WHERE email = ?");
            $consulta->bindParam(1, $_POST['mail'], PDO::PARAM_STR);
            $consulta->execute();

               if ($consulta->fetchColumn() == 0 ) { // Si no existe el resultado, lo insetaré-->
                  $names      	= htmlspecialchars($_POST['name']);
                  $lastn 		    = htmlspecialchars($_POST['last']);
                  $email      	= htmlspecialchars($_POST['mail']);
                  $password   	= $encriptar;
                  //$guardado   = time();
                  //$timestamp  = date("Y-m-d H:i:s", $guardado);               
                  $mensaje = null;
                  $register = new Crud();
                  $register->insert_into      = 'usuario';
                  $register->insert_columns   = 'first_name, last_name, email, passw';
                  $register->insert_values    = "'$names', '$lastn', '$email', '$password'";
                  $register->Create();
                  //header('Location: registro.php');

                  echo '<script>alert("Usuario registrado correctamente.");</script>';
               }else{
                   echo '<script>alert("Este correo ya está registrado, utilice otro e-Mail");</script>';
               }
               // FIN DE CONTROLES DE USUARIO Y CORREO
        }else{
            echo '<script>alert("El correo ingresado no es valido.");</script>';
          }
      
   }else{
      echo '<script>alert("El usuario ingresado no debe superar los 20 carácteres.");</script>';
   }
}
?>
</div>
</div>
</div>
