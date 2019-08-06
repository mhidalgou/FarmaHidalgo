<?php include('head.php'); ?>
<?php include('imaFarmHid.php'); ?>   
  <div class="container">
    <h1>Edita Usuario</h1>
    <!--    <hr/>-->
    <div  class="col-lg-6" >
      <form action="<?php echo $this->url("usuario","update"); ?>" method="post"  >
        <div class="form-group">
          Cedula: <input type="text" name="Cedula" class="form-control" required value="<?php echo $all[0]->Cedula; ?> "/>
        </div>

        <div class="form-group">
          Nombre: <input type="text" name="Nombre" class="form-control" required value="<?php echo $all[0]->Nombre; ?> "/>
        </div>

        <div class="form-group">
          Correo: <input type="email" name="Correo" class="form-control" required value="<?php echo $all[0]->Correo; ?> "/>
        </div>

        <select name="Fk_idRolSelect">
          <option value="1">Administrador</option>
          <option value="2">Dependiente</option>
        </select>

        <select name="EstadoSelect">
          <option value="1">Activo</option>
          <option value="2">Inactivo</option>
        </select>
  
        <input type="hidden" name="IdUsuario" value="<?php echo $all[0]->IdUsuario; ?> " />
        <input type="hidden" name="Password" value="<?php echo $all[0]->Password; ?> " />
        <input type="submit" value="enviar" class="btn btn-success" />
      </form>
    </div>
  </div> 
<?php include('footer.php'); ?>
