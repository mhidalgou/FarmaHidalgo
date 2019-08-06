<?php include('head.php'); ?>
    <h1>Editar cliente x serviico</h1>
    <hr/>
    <div class="col-lg-12 " >
      <form action="<?php echo $this->url("clientexservicio","update"); ?>" method="post"  >
          <div class="form-group">
          Nombre: <input type="text" name="nombre" readonly class="form-control" value="<?php echo $all[0]->cnombre; ?> "/>
          </div>
          <div class="form-group">
          servicio: <input type="text" name="servicio" readonly class="form-control" value="<?php echo $all[0]->dsnombre; ?> "/>
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
