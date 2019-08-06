 window.onload = function(){killerSession();}
  function killerSession(){
  setTimeout("window.open('login/desconecta.php','_top');",300000);
  }

function muestraDetalle(valor){
 alert(valor);
 if (valor == null) {
        document.getElementById("txtHint2").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","view/sacaDetalleAgenda.php?q="+valor,true);
        xmlhttp.send();
    }
}


function muestraClientes(str){
  alert(str);
  if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","view/sacaAgenda.php?q="+str,true);
        xmlhttp.send();
    }
}

function addImput2(){
   var fName = $("<input name=\"ladataarr[]\" type=\"text\" /> <br/>"); 
   $("#elformulario").append(fName);
}

function addDetalle_(){
 
  count++;
  var htmlRows = '';
  htmlRows += '<tr>';
  <?php if (isset($medicamentosg ) && is_array($medicamentosg)){ ?>
  htmlRows += 'Medicamento:  <select name="idmedicamentogg[]">';
    <?php foreach ($medicamentosg as $key => $value): ?>
  htmlRows += '<option value="'<?php echo $value->IdMedicamento[]; ?>'">"'<?php echo $value->nombreMedicamento; ?>'"</option>"';
    <?php endforeach; ?>
  htmlRows += '</select>'
    <?php
  }else{ ?>
    no hay datos.
  <?php }?>
  htmlRows += '<td><input type="number" name="cantidad[]" id="cantidad_'+count+'" class="form-control quantity" autocomplete="off"></td>';      
  htmlRows += '<td><input type="text" name="dosis[]" id="dosis_'+count+'" class="form-control price" autocomplete="off"></td>';    
  htmlRows += '</tr>';
  $('#elformulario').append(htmlRows);
}


function ajax(){
  var datass = $('#elformulario').serializeArray();
  $.ajax({
        url: "view/function.php",
        type:"POST",
        data: {datajax:datass},
        success: function(result){
          $(".larespuestaajax").html(result);
        }
  });
}


 