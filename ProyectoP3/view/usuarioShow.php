<?php include('head.php'); ?>
<?php include('imaFarmHid.php'); ?>   
  <div class="container">
    <div class="col-lg-12">
      <h3>Usuarios</h3>  
        <table class="table table-hover" id="enc_usuarios" >
          <thead>
            <tr>
              <th scope="col">Id Usuario</td>
              <th scope="col">Cedula</td>
              <th scope="col">Nombre</td>
              <th scope="col">Rol</td>
              <th scope="col">Estado</td>
              <th scope="col">Correo</td>
              <!--<th scope="col">Accion</td>-->
            </tr>
          </thead>
          <tbody id="det_usuarios">
            <?php foreach ($all as $key => $value): ?>
              <tr>
                <td><?php echo $value->IdUsuario; ?></td>
                <td><?php echo $value->Cedula; ?></td>
                <td><?php echo $value->Nombre; ?></td>
                <td><?php echo $value->NombreRol; ?></td>
                <td><?php echo $value->NombreEstado; ?></td>
                <td><?php echo $value->Correo; ?></td>
                <td hidden><?php echo $value->Password;?></td>
                <td hidden><?php echo $value->Fk_idRol;?></td>
                <td hidden><?php echo $value->Estado;?></td>
                <!--<td><a href="<?php //echo $this->url("persona","erase"); ?>&id=<?php //echo $value->id; ?>" class="btn btn-danger">Borrar</a></td>-->
                <?php if ($_SESSION['usuario']['fk_idrol'] == 1): ?>
                  <td><a href="<?php echo $this->url("usuario","Edit"); ?>&IdUsuario=<?php echo $value->IdUsuario; ?>" class="btn btn-primary">Editar</a></td>
                <?php endif; ?>
              </tr>
            <?php endforeach; ?>
            <!--<p id="response"></p>-->
          </tbody>
        </table>
      </div>
    </table>
  </div>  
<?php include('footer.php'); ?>
