<?php include('head.php'); ?>
    <h1>Editar cliente x serviico</h1>
    <hr/>
    <div class="col-lg-12 " >
      <form action="<?php echo $this->url("clientexservicio","insert"); ?>" method="post"  >
          <div class="form-group">
            <?php if (isset($clientesg ) && is_array($clientesg )){ ?>

              nombre:  <select name="idclientegg" name="">

              <?php foreach ($clientesg as $key => $value): ?>

              <option value="<?php echo $value->id; ?>"><?php echo $value->nombre." ".$value->apellido." ".$value->cedula; ?></option>

              <?php endforeach; ?>

            </select>
            <?php
              }else{ ?>
               no hay datos.
              <?php }?>
          </div>
          <div class="form-group">
            <?php if (isset($serviciosg ) && is_array($serviciosg )){ ?>

              servicio:  <select name="idServiciogg" name="">

              <?php foreach ($serviciosg as $key => $value): ?>

              <option value="<?php echo $value->id; ?>"><?php echo $value->nombre; ?></option>

              <?php endforeach; ?>

            </select>
            <?php
              }else{ ?>
               no hay datos.
              <?php }?>
          </div>
          <select name="statusSelect" name="">
            <option value="0">Active</option>
            <option value="1">Inactive</option>
          </select>

          <input type="submit" value="enviar" class="btn btn-success" />

      </form>
    </div>
<?php include('footer.php'); ?>
