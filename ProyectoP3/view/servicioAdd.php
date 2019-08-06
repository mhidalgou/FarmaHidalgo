<?php include('head.php'); ?>
    <h1>Agregar</h1>
    <hr/>
    <div class="col-lg-12 " >
      <form action="<?php echo $this->url("servicio","insert"); ?>" method="post"  >

          <div class="form-group">
          Nombre: <input type="text" name="nombre" class="form-control" value=" "/>
          </div>
          <div class="form-group">
          Descripcion: <input type="text" name="descripcion" class="form-control" value=""/>
          </div>
          <select name="statusSelect" name="">
            <option value="0">Active</option>
            <option value="1">Inactive</option>
          </select>
          <input type="submit" value="enviar" class="btn btn-success" />
      </form>
    </div>
<?php include('footer.php'); ?>
