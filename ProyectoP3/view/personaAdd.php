
<?php include('head.php'); ?>
<?php include('imaFarmHid.php'); ?>   
<?php 

if (isset($_SESSION['usuario']) && $_SESSION['usuario']['fk_idrol']==1) {
   
}else{
   $this->redirect("home", "index");
}

?>
<div class="container">
    <h1>Agregar</h1>
    <hr/>
    <div class="col-lg-6 " >
      <form action="<?php echo $this->url("persona","insert"); ?>" method="post"  >
          <div class="form-group">
          Cedula: <input type="text" name="Cedula" class="form-control" required value=""/>
          </div>

          <div class="form-group">
          Nombre: <input type="text" name="Nombre" class="form-control" required value=""/>
          </div>

          <div class="form-group">
          Apellidos: <input type="text" name="Apellidos" class="form-control" required value=""/>
          </div>

          <div class="form-group">
          Telefono: <input type="text" name="Telefono" class="form-control" required value=""/>
          </div>

          <div class="form-group">
          Direccion: <input type="text" name="Direccion" class="form-control" required value=""/>
          </div>

          <div class="form-group">
          Nacido el: <input type="date"  name="Fecha_nacimiento" class="form-control" required value=""/>
          </div>
          <select name="EstadoSelect">
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
          </select>
        <input type="submit" value="enviar" class="btn btn-success" />
      </form>
    </div>
  </div>  
<?php include('footer.php'); ?>
