<?php include('head.php'); ?>
<?php include('imaFarmHid.php'); ?>   
  <div class="container">
    <div class="col-lg-12">
      <h3>Agenda</h3>  
      <?php if (isset($juan) && is_array($juan)){ ?>
        <hr/>
        <table>
          <thead>
            <tr>
              <th width="5%">Id</th>
              <th width="10%">Fecha</th>
              <th width="30%">Cliente</th>
              <th width="15%">Telefono</th>
              <th width="20%">Doctor</th>
              <th width="5%"><img class="pequena" src="img/llamar.png"/></th>
              <th width="5%"><img class="pequena" src="img/Express.png"/></th>
              <th width="10">Estado</th>
            </tr>
          </thead>
          <?php foreach ($juan as $key => $value): ?>
            <tr>
              <td width="5%"><?php echo $value->IdAgenda; ?></td>
              <td width="10%"><?php echo $value->Fecha; ?></td>
              <td width="30%"><?php echo $value->NombreCliente." ".$value->ApellidosCliente; ?></td>
              <td width="15%"><?php echo $value->TelefonoCliente; ?></td>
              <td width="20%"><?php echo $value->NombreDoctor; ?></td>
              <td width="5%"><?php echo $value->Clientellamado; ?></td>
              <td width="5%"><?php echo $value->ServicioExpress; ?></td>
              <td width="10%"><?php echo $value->NombreEstado; ?></td>
              <!--<td><a href="<?php echo $this->url("agenda","erase"); ?>&id=<?php echo $value->id; ?>" class="btn btn-danger">Borrar</a></td>-->
              <?php if ($_SESSION['usuario']['fk_idrol'] == 1): ?>
                <td><a href="<?php echo $this->url("agenda","edit"); ?>&IdAgenda=<?php echo $value->IdAgenda; ?>" class="btn btn-primary">Editar</a></td>
              <?php endif; ?>
            </tr>
          <?php endforeach; ?>
        </table>
      <?php}else{ ?>
        <tr>
          <td colspan="8">-Ultima linea-</td>
        </tr>  
      <?php }?>
    </div>
  </div>    
<?php include('footer.php'); ?>

