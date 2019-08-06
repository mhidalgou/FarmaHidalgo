<?php
$q =($_GET['q']);
if (isset($q)){
	$q ="'".($_GET['q'])."'";
}else{
	$q="'".getdate()."'";
}
//var_dump($q);

include('../core/cls_conexion.php');
include('../model/cls_agenda.php');
$miAgenda= new cls_agenda();
$all=$miAgenda->getDetIdAgenda($q);
echo "<h3>Medicamentos</h3>" ;
echo "<table class='table table-striped' id='medicamentos'>";
	echo "<thead>";
		echo "<tr>";
			echo "<th width='5%'>Item </th>";
			echo "<th width='20%'>Nombre</th>";
			echo "<th width='10%'>Cant</th>";
			echo "<th width='60%'>Indicaciones</th>";
			echo "<th width='5%'><img class='pequena' src='img/factura.png'/></th>";
		echo "</tr>";
	echo "</thead>";
	if (isset($all)){
		foreach ($all as $key => $value) {
			echo "<tr>";
				echo "<td>".$value->ItemId."</td>";
				echo "<td>".$value->NombreMedicamento."</td>";
				echo "<td>".$value->Cantidad."</td>";
				echo "<td>".$value->Dosis."</td>";
				echo "<td width='5%'> <input type='checkbox' value='".$value->Facturar."'></td>";
			echo "</tr>";}
	}else{
		echo "<tr>";
		echo "<td colspan='5'>No hay datos</td>";
		echo "</tr>";

	}

echo "</table>";

?>
