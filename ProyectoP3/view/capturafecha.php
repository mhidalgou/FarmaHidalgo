<div class="row row-no-gutters">
	<div class="col-sm-2" >
    	<div class="form-group"> <!-- Date input -->
        	<label class="control-label" for="date">Fecha:</label>
        	<input class="form-control" id="date" name="date" placeholder="DD/MM/YYY" type="date" required="true" onchange="muestraClientes(this.value)" onload="muestraClientes(getdate())" />
    	</div>
		<!--<div class="form-group"> 
			<button class="btn btn-primary " name="submit" type="submit">Buscar</button>
  		</div>-->
	</div>
</div>

<script type="text/javascript">
	
	function muestraClientes(str){

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

function muestraDetalle(valor){

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
</script>
