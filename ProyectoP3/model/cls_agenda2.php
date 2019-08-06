<?php
class cls_Agenda2 extends cls_conexion{
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "farmahidalgo";   
	private $invoiceUserTable = 'factura_usuarios';	
    private $invoiceOrderTable = 'agenda';
	private $invoiceOrderItemTable = 'agendadetalle';
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_assoc($result)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}
	public function loginUsers($email, $password){
		$sqlQuery = "
			SELECT id, email, first_name, last_name, address, mobile 
			FROM ".$this->invoiceUserTable." 
			WHERE email='".$email."' AND password='".$password."'";
        return  $this->getData($sqlQuery);
	}	
	public function checkLoggedIn(){
		if(!$_SESSION['usuario']) {
			header("Location:index.php");
		}
	}		
	public function saveInvoice($POST) {		
		$sqlInsert = "
			INSERT INTO ".$this->invoiceOrderTable."(fk_idUsuario, fk_idCliente, fk_idDoctor, fecha, Clientellamado, ServicioExpress, estado) 
			VALUES ('".$POST['fk_idUsuario']."', '".$POST['fk_idCliente']."', '".$POST['fk_idDoctor']."', '".$POST['fecha']."', 1, 1,  1')";		
		mysqli_query($this->dbConnect, $sqlInsert);
		$lastInsertId = mysqli_insert_id($this->dbConnect);
		for ($i = 0; $i < count($POST['fk_idMedicamento']); $i++) {
			$sqlInsertItem = "
			INSERT INTO ".$this->invoiceOrderItemTable."(fk_idAgenda, fk_Medicamento, cantidad, dosis, facturar, estado) 
			VALUES ('".$lastInsertId."', '".$POST['fk_Medicamento'][$i]."', '".$POST['cantidad'][$i]."', '".$POST['dosis'][$i]."', 1,1')";			
			mysqli_query($this->dbConnect, $sqlInsertItem);
		}       	
	}	
	public function updateInvoice($POST) {
		if($POST['invoiceId']) {	
			$sqlInsert = "
				UPDATE ".$this->invoiceOrderTable." 
				SET fk_idCliente = '".$POST['fk_idCliente']."', fk_idDoctor= '".$POST['fk_idDoctor']."', fecha = '".$POST['fecha']."', Clientellamado = '".$POST['Clientellamado']."', ServicioExpress = '".$POST['ServicioExpress']."', fk_idUsuario = '".$POST['fk_idUsuario']."', estado = '".$POST['Estado']."
				WHERE idAgenda = '".$POST['idAgenda'];		
			mysqli_query($this->dbConnect, $sqlInsert);	
		}		
		$this->deleteInvoiceItems($POST['invoiceId']);
		for ($i = 0; $i < count($POST['fk_Medicamento']); $i++) {			
			$sqlInsertItem = "
				INSERT INTO ".$this->invoiceOrderItemTable."(fk_idAgenda, fk_Medicamento, cantidad, Dosis, facturar, Estado) 
				VALUES ('".$POST['idAgenda']."', '".$POST['fk_Medicamento'][$i]."', '".$POST['cantidad'][$i]."', '".$POST['facturar'][$i]."', '".$POST['Estado'][$i]."')";			
			mysqli_query($this->dbConnect, $sqlInsertItem);			
		}       	
	}	
	public function getInvoiceList(){
		$sqlQuery = "
			SELECT * FROM ".$this->invoiceOrderTable ;
		return  $this->getData($sqlQuery);
	}	
	public function getInvoice($invoiceId){
		$sqlQuery = "
			SELECT * FROM ".$this->invoiceOrderTable." 
			WHERE idAgenda = '$invoiceId'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_assoc($result);
		return $row;
	}	
	public function getInvoiceItems($invoiceId){
		$sqlQuery = "
			SELECT * FROM ".$this->invoiceOrderItemTable." 
			WHERE fk_idAgenda = '$invoiceId'";
		return  $this->getData($sqlQuery);	
	}
	public function deleteInvoiceItems($invoiceId){
		$sqlQuery = "
			DELETE FROM ".$this->invoiceOrderItemTable." 
			WHERE fk_idAgenda = '".$invoiceId."'";
		mysqli_query($this->dbConnect, $sqlQuery);				
	}
	public function deleteInvoice($invoiceId){
		$sqlQuery = "
			DELETE FROM ".$this->invoiceOrderTable." 
			WHERE idAgenda = '".$invoiceId."'";
		mysqli_query($this->dbConnect, $sqlQuery);	
		$this->deleteInvoiceItems($invoiceId);	
		return 1;
	}
}
?>