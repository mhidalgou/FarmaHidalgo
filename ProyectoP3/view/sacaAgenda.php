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
$all=$miAgenda->getByFecha($q);

echo "<h3>Pacientes</h3>" ;
echo "<table class='table table-hover' id='pacientes'>";
echo "<thead>";
echo "<tr>";
echo "<th width='40%'>Nombre</th>";
echo "<th width='30%'>Telefono</th>";
echo "<th width='20%'>Doctor</th>";
echo "<th width='5%'><img class='pequena' src='img/llamar.png'/></th>";
echo "<th width='5%'><img class='pequena' src='img/Express.png'/></th>";
echo "</tr>";
echo "</thead>";
if (isset($all)){
foreach ($all as $key => $value) {
	echo "<tr value='".$value->IdAgenda."' onclick='muestraDetalle(".$value->IdAgenda.")'>";
	//echo "<tr value='".$value->IdAgenda."'>";
	echo "<td>".$value->NombreCliente.' '.$value->ApellidosCliente."</td>";
	echo "<td>".$value->TelefonoCliente."</td>";
	echo "<td>".$value->NombreDoctor."</td>";
	echo "<td width='5%'> <input type='checkbox' value='".$value->Clientellamado."'></td>";
	echo "<td width='5%'> <input type='checkbox' value='".$value->ServicioExpress."'></td>";

	echo "</tr>";}
	// <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
}else{
	echo "<tr>";
	echo "<td colspan='5'>No hay datos</td>";
	echo "</tr>";

}

echo "</table>";
//echo "</div>";
?>

	