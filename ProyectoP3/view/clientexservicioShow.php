<?php include('head.php'); ?>
    <h1>Cliente servicio SHOW</h1>
 <?php 
 if (isset($all) && is_array($all)){ ?>
    <hr/>
    <table>
      <tr>
        <td>id</td>
        <td>cliente</td>
        <td>detalleServicio</td>
        <td>status</td>
      </tr>
    <?php
    foreach ($all as $key => $value): ?>
         <tr>
           <td><?php echo $value->id; ?></td>
           <td><?php echo $value->cnombre; ?></td>
           <td><?php echo $value->dsnombre; ?></td>
           <td><?php echo $value->status; ?></td>
           <!--<td><a href="<?php echo $this->url("servicio","erase"); ?>&id=<?php echo $value->id; ?>" class="btn btn-danger">Borrar</a></td>-->
           <?php if ($_SESSION['usuario']['id_roll'] == 1): ?>
             <td><a href="<?php echo $this->url("clientexservicio","edit"); ?>&id=<?php echo $value->id; ?>" class="btn btn-primary">Editar</a></td>
           <?php endif; ?>
         </tr>
    <?php endforeach; ?>

    </table>
<?php
  }else{ ?>
   no hay datos.
  <?php }?>
<?php include('footer.php'); ?>
