<?php include('head.php'); ?>
<?php include('imaFarmHid.php'); ?>   
<div class="container">
    <h1>Agregar</h1>
    <hr/>
    <div class="col-lg-6 " >
      <form action="<?php echo $this->url("doctor","insert"); ?>" method="post"  >
          <div class="form-group">

           <?php if (isset($doctoresg ) && is_array($doctoresg)){ ?>

              Doctor:  <select name="iddoctorgg">

              <?php foreach ($doctoresg as $key => $value): ?>

              <option value="<?php echo $value->IdPersona; ?>"><?php echo $value->Nombre." ".$value->Apellidos; ?></option>

              <?php endforeach; ?>

            </select>
            <?php
              }else{ ?>
               no hay datos.
              <?php }?>

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
