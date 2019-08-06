<?php include('head.php'); ?>

    <h1>Editar</h1>
    <hr/>
    <div class="col-lg-12 " >
      <form action="<?php echo $this->url("servicio","update"); ?>" method="post"  >
          <div class="form-group">
          Nombre: <input type="text" name="nombre" class="form-control" value="<?php echo $all[0]->nombre; ?> "/>
          </div>
          <div class="form-group">
          Descripcion: <input type="text" name="descripcion" class="form-control" value="<?php echo $all[0]->descripcion; ?> "/>
          </div>
          <select name="statusSelect" name="">
            <option value="0">Active</option>
            <option value="1">Inactive</option>
          </select>
          <input type="hidden" name="id" value="<?php echo $all[0]->id; ?> " />
          <input type="submit" value="enviar" class="btn btn-success" />

      </form>
    </div>
<?php include('footer.php'); ?>
