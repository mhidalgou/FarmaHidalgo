<?php include('head.php'); ?>
<?php include('imaFarmHid.php'); ?>   
  <div class="container">
   	<div class="col-lg-12">
  		<h3>Personas</h3>  
  		<table class="table table-hover" id="enc_personas" >
   			<thead>
   				<tr>
     				<th scope="col">Id Persona</td>
     				<th scope="col">Cedula</td>
     				<th scope="col">Nombre</td>
     				<th scope="col">Apellidos</td>
     				<th scope="col">Telefono</td>
     				<th scope="col">Direccion</td>
     				<th scope="col">Nacido</td>
     				<th scope="col">Estado</td>
     				<!--<th scope="col">Accion</td>-->
   				</tr>
   			</thead>
   			<tbody id="det_personas">
   				<?php foreach ($juan as $key => $value): ?>
     				<tr>
       				<td><?php echo $value->IdPersona; ?></td>
       				<td><?php echo $value->Cedula; ?></td>
       				<td><?php echo $value->Nombre; ?></td>
       				<td><?php echo $value->Apellidos; ?></td>
       				<td><?php echo $value->Telefono; ?></td>
       				<td><?php echo $value->Direccion; ?></td>
       				<td><?php echo $value->Fecha_nacimiento; ?></td>
       				<td><?php echo $value->NombreEstado; ?></td>
              <td hidden><?php echo $value->Estado;?></td>
       				<!--<td><a href="<?php //echo $this->url("persona","erase"); ?>&id=<?php //echo $value->id; ?>" class="btn btn-danger">Borrar</a></td>-->
       				<?php if ($_SESSION['usuario']['fk_idrol'] == 1): ?>
         					<td><a href="<?php echo $this->url("persona","Edit"); ?>&IdPersona=<?php echo $value->IdPersona; ?>" class="btn btn-primary">Editar</a></td>
       				<?php endif; ?>
     				</tr>
   				<?php endforeach; ?>
  			</tbody>
  		</table>
		</div>
  </div>  
<?php include('footer.php'); ?>
