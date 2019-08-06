<?php include('head.php'); ?>
<?php include('imaFarmHid.php'); ?>   
<div class="container">
    <h1>Agregar</h1>
    <hr/>
    <div class="col-lg-6 " >
      <form action="<?php echo $this->url("usuario","insert"); ?>" method="post"  >
          <div class="form-group">
          Cedula: <input type="text" name="Cedula" class="form-control" required value=""/>
          </div>

          <div class="form-group">
          Nombre: <input type="text" name="Nombre" class="form-control" required value=""/>
          </div>

          <div class="form-group">
          Password  <input type="password" name="Password" class="form-control" required value=""/>
          </div>

          <div class="form-group">
          Correo  <input type="email" name="Correo" class="form-control" required value=""/>
          </div>

          <select name="Fk_idRolSelect">
            <option value="1">Administrdor</option>
            <option value="2">Dependiente</option>
          </select>


          <select name="EstadoSelect">
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
          </select>
        <input type="submit" value="enviar" class="btn btn-success" />
      </form>
    </div>
  </div>  
<?php include('footer.php'); ?>
