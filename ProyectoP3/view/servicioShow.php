<?php include('head.php'); ?>
    <h1>SHOW</h1>
    <?php echo "aqui ".$Hola; ?>
    <hr/>
    <table>
      <tr>
        <td>id</td>
        <td>nombre</td>
        <td>descripcion</td>
        <td>status</td>
      </tr>
    <?php foreach ($juan as $key => $value): ?>
         <tr>
           <td><?php echo $value->id; ?></td>
           <td><?php echo $value->nombre; ?></td>
           <td><?php echo $value->descripcion; ?></td>
           <td><?php echo $value->status; ?></td>
           <!--<td><a href="<?php echo $this->url("servicio","erase"); ?>&id=<?php echo $value->id; ?>" class="btn btn-danger">Borrar</a></td>-->
           <?php if ($_SESSION['usuario']['id_roll'] == 1): ?>
             <td><a href="<?php echo $this->url("servicio","edit"); ?>&id=<?php echo $value->id; ?>" class="btn btn-primary">Editar</a></td>
           <?php endif; ?>
         </tr>
    <?php endforeach; ?>
    </table>
<?php include('footer.php'); ?>
