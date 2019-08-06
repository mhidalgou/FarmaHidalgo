<?php include('head.php'); ?>
<?php include('imaFarmHid.php'); ?>   
 <div class="container">
    <h1>Edita Persona</h1>
    <hr/>
    <div  class="col-lg-6" >
      <form action="<?php echo $this->url("persona","update"); ?>" method="post"  >
         <div class="form-group">
          Cedula: <input type="text" name="Cedula" class="form-control" required value="<?php echo $all[0]->Cedula; ?> "/>
         </div>

         <div class="form-group">
          Nombre: <input type="text" name="Nombre" class="form-control" required value="<?php echo $all[0]->Nombre; ?> "/>
         </div>

         <div class="form-group">
            Apellidos: <input type="text" name="Apellidos" class="form-control" required  value="<?php echo $all[0]->Apellidos; ?> "/>
          </div>

          <div class="form-group">
            Telefono: <input type="text" name="Telefono" class="form-control" required value="<?php echo $all[0]->Telefono; ?> "/>
          </div>

          <div class="form-group">
            Direccion: <input type="text" name="Direccion" class="form-control" required value="<?php echo $all[0]->Direccion; ?> "/>
          </div>

          <div class="form-group">
            Nacido el: <input type="date"  name="Fecha_nacimiento" class="form-control" required value="<?php 
            echo $all[0]->Fecha_nacimiento; ?> "/>
          </div>
          <select name="EstadoSelect" name="">
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
          </select>
  
          <input type="hidden" name="IdPersona" value="<?php echo $all[0]->IdPersona; ?> " />
          <input type="submit" value="enviar" class="btn btn-success" />
        </form>
      </div>
   </div> 
<?php include('footer.php'); ?>
