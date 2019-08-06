<?php 
session_start();
include('header.php');
include 'cls_agenda2.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
?>
<title>baulphp : Sistema facturación PHP & MySQL</title>
<script src="js/funciones.js"></script>
<link href="css/formatos.css" rel="stylesheet">
<?php include('container.php');?>
<div class="container">		
<h2 class="title">Sistema de facturación PHP</h2>
<?php include('menu.php');?>			  
<table id="data-table" class="table table-condensed table-striped">
<thead>
  <tr>
    <th width="7%">Id Agenda</th>
    <th width="15%">Fecha</th>
    <th width="35%">Cliente</th>
    <th width="15%">Doctor</th>
    <th width="3%"></th>
    <th width="3%"></th>
    <th width="3%"></th>
  </tr>
</thead>
<?php		
$invoiceList = $invoice->getInvoiceList();
foreach($invoiceList as $invoiceDetails){
    $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["Fecha"]));
    echo '
      <tr>
        <td>'.$invoiceDetails["idAgenda"].'</td>
        <td>'.$invoiceDate.'</td>
        <td>'.$invoiceDetails["Fk_idCliente"].'</td>
        <td>'.$invoiceDetails["Fk_idDoctor"].'</td>
        <td><a href="edit_invoice.php?update_id='.$invoiceDetails["idAgenda"].'"  title="Editar Factura"><div class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></div></a></td>
        <td><a href="#" id="'.$invoiceDetails["idAgenda"].'" class="deleteInvoice"  title="Borrar Factura"><div class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></div></a></td>
      </tr>
    ';
}       
?>
</table>	
</div>	
<?php include('footer.php');?>