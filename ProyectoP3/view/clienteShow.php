<?php include('head.php'); ?>
<?php include('imaFarmHid.php'); ?>   
  <div class="container">
   	<div class="col-lg-12">
  		<h3>Clientes</h3>  
  		<table class="table table-hover" id="enc_clientes" >
   			<thead>
   				<tr>
     				<th scope="col">Id Cliente</td>
     				<th scope="col">Nombre</td>
     				<th scope="col">Apellidos</td>
     				<th scope="col">Estado</td>
     				<!--<th scope="col">Accion</td>-->
   				</tr>
   			</thead>
   			<tbody id="det_clientes">
   				<?php foreach ($juan as $key => $value): ?>
     				<tr>
       				<td><?php echo $value->IdCliente; ?></td>
       				<td><?php echo $value->Nombre; ?></td>
       				<td><?php echo $value->Apellidos; ?></td>
       				<td><?php echo $value->NombreEstado; ?></td>
              <td hidden><?php echo $value->Estado;?></td>
              <td hidden><?php echo $value->IdPersona;?></td>
       				<!--<td><a href="<?php //echo $this->url("persona","erase"); ?>&id=<?php //echo $value->id; ?>" class="btn btn-danger">Borrar</a></td>-->
       				<?php if ($_SESSION['usuario']['fk_idrol'] == 1): ?>
         					<td><a href="<?php echo $this->url("cliente","Edit"); ?>&IdCliente=<?php echo $value->IdCliente; ?>" class="btn btn-primary">Editar</a></td>
       				<?php endif; ?>
     				</tr>
   				<?php endforeach; ?>
  			</tbody>
  		</table>
		</div>
  </div>  
<?php include('footer.php'); ?>
