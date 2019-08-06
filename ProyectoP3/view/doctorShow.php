<?php include('head.php'); ?>
<?php include('imaFarmHid.php'); ?>   
  <div class="container">
   	<div class="col-lg-12">
  		<h3>Doctores</h3>  
  		<table class="table table-hover" id="enc_doctores" >
   			<thead>
   				<tr>
     				<th width="10%" scope="col">Id Doctor</td>
     				<th width="30%" scope="col">Nombre</td>
     				<th width="40%" scope="col">Apellidos</td>
     				<th width="20%" scope="col">Estado</td>
            <th></th>  
     				<!--<th scope="col">Accion</td>-->
   				</tr>
   			</thead>
   			<tbody id="det_doctores">
   				<?php foreach ($juan as $key => $value): ?>
     				<tr>
       				<td width="10%"><?php echo $value->IdDoctor; ?></td>
       				<td width="30%"><?php echo $value->Nombre; ?></td>
       				<td width="40%"><?php echo $value->Apellidos; ?></td>
       				<td width="20%"><?php echo $value->NombreEstado; ?></td>
              <td hidden><?php echo $value->Estado;?></td>
              <td hidden><?php echo $value->IdPersona;?></td>
       				<!--<td><a href="<?php //echo $this->url("persona","erase"); ?>&id=<?php //echo $value->id; ?>" class="btn btn-danger">Borrar</a></td>-->
       				<?php if ($_SESSION['usuario']['fk_idrol'] == 1): ?>
         					<td><a href="<?php echo $this->url("doctor","Edit"); ?>&IdDoctor=<?php echo $value->IdDoctor; ?>" class="btn btn-primary">Editar</a></td>
       				<?php endif; ?>
     				</tr>
   				<?php endforeach; ?>
  			</tbody>
  		</table>
		</div>
  </div>  
<?php include('footer.php'); ?>
