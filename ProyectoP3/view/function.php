<?php 
 if (isset($_POST['datajax']) && $_POST['datajax'] == 1 ) {
 	?>
 	<?php //echo "dataaa ".unserialize(base64_decode($_POST['cadena']));?>
 	<?php if (true){ ?>
          Medicamento:  <select name="idmedicamentogg[]">
            <?php foreach (json_decode(base64_decode($_POST['cadena'])) as $key => $value): ?>
              <option value="<?php echo $value->idMedicamento; ?>"><?php echo $value->nombreMedicamento; ?></option>
            <?php endforeach; ?>
          </select>
          <?php
            }else{ echo "no data"; }?> 
 		Cantidad: <input id="Cantidad" name="Cantidad[]" type="text" required="true">
 		Dosis: <input id="Dosis" name="Dosis[]" type="text" required="true"> 
 	<?php 
 }
 ?>
