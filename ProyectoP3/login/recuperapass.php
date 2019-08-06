<?php  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Farmacias Hidalgo</title>
      	<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      	<script src="js/funciones.js"></script>  		
  		<link rel="stylesheet" href="../css/formatos.css">
    </head>
	<body>
		<div class="center" align="center"> 
	    	<img src="..\img/farmahidalgo.png" class="img-rounded" alt="Cinque Terre" align="center" > 
	    	<h4>Recuperacion de Password</h4>
		</div>
		<div class="container">
	    	<div class="row" aling="center">
	        	<div class="col-sm-6 col-md-4 col-md-offset-4">
	            	<form class="form-signin" method="post" action="recupera.php" >
	                	<label for="inputUsuario" class="sr-only">Usuario</label>
	                	<input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
	                	<button class="btn btn-lg btn-primary btn-block" value="Recuperar" type="submit">Enviar Correo</button>
		        	</form>
	        	</div>
	    	</div>
		</div> 
	</body>
</html>