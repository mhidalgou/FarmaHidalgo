<?php include('head.php'); ?>
<?php include('imaFarmHid.php'); ?>  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><!-- libreria para poder utilizar jquery --> 

 <?php $seria = base64_encode(json_encode($medicamentosg));?>
<div class="container">
  <h1>Agregar Agenda</h1>
  <hr/>
  <div class="row">
    <form action="<?php echo $this->url("agenda","insert"); ?>" method="post"  id="elformulario">
      <div class="col-lg-12 " >
        <div class="form-group">
          <?php if (isset($clientesg ) && is_array($clientesg)){ ?>
            Cliente:  <select name="idclientegg">
              <?php foreach ($clientesg as $key => $value): ?>
                <option value="<?php echo $value->IdCliente; ?>"><?php echo $value->Nombre." ".$value->Apellidos; ?></option>
              <?php endforeach; ?>
            </select>
            <?php
              }else{ ?>
               no hay datos.
              <?php }?>
           <?php if (isset($doctoresg ) && is_array($doctoresg)){ ?>
              Doctor:  <select name="iddoctorgg">
              <?php foreach ($doctoresg as $key => $value): ?>
              <option value="<?php echo $value->IdDoctor; ?>"><?php echo $value->Nombre." ".$value->Apellidos; ?></option>
              <?php endforeach; ?>
            </select>
            <?php
              }else{ ?>
               no hay datos.
              <?php }?>
          Fecha: <input id="Fecha" name="Fecha" placeholder="DD/MM/YYY" type="date" required="true"/>  
          <input type="hidden" name="ServicioExpress" value="1" />
          <input type="hidden" name="Clientellamado" value="1" />
          <input type="hidden" name="EstadoSelect" value="1" />
          <input type="hidden" name="Fk_idUsuario" value="<?php echo $_SESSION['usuario']['idusuario'];?>"/>            
          <span onclick="ajax('<?php echo $seria; ?>')"><button type="button" name="button">ADD</button> </span>
          <input type="submit" class="enviarlos"   value="Guardar Agenda" />
        </div>
      </div>
     </form>
    <div class="larespuestaajax"></div>    
  </div>    
  <br/>
 

</div>  
<?php include('footer.php'); ?>


<script type="text/javascript">
 
function addDetalle( ){
 //alert("Hola");
  ajax();

}

function ajax(cadenaaa){
  $.ajax({
        url: "view/function.php",
        type:"POST",
        data: {datajax:1,cadena:cadenaaa},
        success: function(result){

          $("#elformulario").append(result+'<br>');
          //$(".larespuestaajax").html(result);
        },
          error: function(result){
          alert('error');
        }
  });
  
}

</script>

