<?php include('head.php'); ?>
<?php include('imaFarmHid.php'); ?>   
 <div class="container">
    <h1>Edita Agenda</h1>
    <hr/>
    <div  class="col-lg-8" >
      <form action="<?php echo $this->url("agenda","update"); ?>" method="post"  >
         <div class="form-group">
            Cliente: <input type="text" name="NombreCliente" class="form-control" required readonly value="<?php echo $all[0]->NombreCliente.' '.$all[0]->ApellidosCliente; ?> "/>

            Doctor <input type="text" name="NombreDoctor" class="form-control" required readonly value="<?php echo $all[0]->NombreDoctor; ?> "/>
            Fecha: <input id="Fecha" name="Fecha" placeholder="DD/MM/YYY" type="date" required="true" value="<?php echo $all[0]->Fecha; ?>"/>  
            Express:<select name="ServicioExpressSelect">
              <option value="1">Si</option>
              <option value="2">No</option>
            </select>

            Llamado:<select name="ClientellamadoSelect">
            <option value="1">Si</option>
            <option value="2">No</option>
            </select>

            Estado:<select name="EstadoSelect">
              <option value="1">Activo</option>
              <option value="2">Inactivo</option>
            </select>

            <input type="hidden" name="Fk_idUsuario" value="<?php echo $_SESSION['usuario']['idusuario'];?>"/>       
            <input type="hidden" name="Fk_idCliente" value="<?php echo $all[0]->fk_idCliente; ?> " />
            <input type="hidden" name="Fk_idDoctor" value="<?php echo $all[0]->fk_idDoctor; ?> " />
            <input type="hidden" name="IdAgenda" value="<?php echo $all[0]->IdAgenda; ?> " />
            <input type="submit" value="enviar" class="btn btn-success" />
          </div>
        </form>
      </div>
   </div> 
<?php include('footer.php'); ?>
      