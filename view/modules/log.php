<div class="container-fluid" style="background-color: #FFFFCC;

   background-image: url(resources/img/med.jpg);

   background-repeat: no-repeat;

   background-attachment: scroll;

   background-size: cover; min-height: 590px; margin-top:-20px">
	<div class="row">
        <div class="col-md-12"><br />
            <?php
                $register = new MvcController();
                $register->ingresoUsuarioController();
            
                if (isset($_GET["action"])){
                    if ($_GET["action"] == "fail"){
                        echo "<div class='alert alert-warning'><b>Fallo al entrar al sistema</b></div>";
            		}
            		
            		if ($_GET["action"] == "fail3"){
                        echo "<div class='alert alert-danger'><b>Ha fallado 3 veces</b></div>";
                    }
                }
                
            ?>
        </div>
		<div class="col-md-5"></div>
        <div class="col-md-4"><br /><br />
			<h1 align="center" class="mt-4">Iniciar Sesión</h1><hr />
        	<form method="post">
              <div class="form-group">
        	    <label>Tipo de Usuario</label>
        	    <select class="form-control" name="tipo">
                    <option value="1">Administrador</option>
                    <option value="2">Empleado</option>
                    
                </select>
        	    <!--<small class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        	  </div>
        	  <div class="form-group">
        	    <label>Correo Electrónico</label>
        	    <input type="text" class="form-control" name="email" placeholder="Enter email" value="crespin@outlook.es">
        	    <!--<small class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        	  </div>
        	  <div class="form-group">
        	    <label for="exampleInputPassword1">Password</label>
        	    <input type="password" name="passw" class="form-control" placeholder="Password" value="1234" />
        	  </div>
        
        	  <input type="submit" class="btn btn-primary btn-block" value="Iniciar Sesión" />
        	  <button type="reset" class="btn btn-warning btn-block">Cancelar</button>
        	  <!--<div class="alert alert-danger mt-4">
        	  	<center><a href="reg.php" class="text-dark" style="font-weight: bold">Registrarse aquí</a></center>
        	  </div>-->
        	</form>
        </div>
        <div class="col-md-3"></div>
</div>
</div>