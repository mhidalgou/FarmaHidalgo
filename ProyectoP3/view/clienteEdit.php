<?php include('head.php'); ?>
<?php include('imaFarmHid.php'); ?>   
 <div class="container">
    <h1>Edita Cliente</h1>
    <hr/>
    <div  class="col-lg-6" >
      <form action="<?php echo $this->url("cliente","update"); ?>" method="post"  >
         <div class="form-group">
         <div class="form-group">
          Nombre: <input type="text" name="Nombre" class="form-control" required readonly value="<?php echo $all[0]->Nombre; ?> "/>
         </div>

         <div class="form-group">
            Apellidos: <input type="text" name="Apellidos" class="form-control" required readonly value="<?php echo $all[0]->Apellidos; ?> "/>
          </div>

          <select name="EstadoSelect">
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
          </select>
  
          <input type="hidden" name="IdCliente" value="<?php echo $all[0]->IdCliente; ?> " />
          <input type="submit" value="enviar" class="btn btn-success" />
        </form>
      </div>
   </div> 
<?php include('footer.php'); ?>
