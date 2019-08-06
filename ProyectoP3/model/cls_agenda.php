<?php
/**
 *
 */
class cls_agenda extends cls_conexion
{
  private $idagenda,$fk_idcliente,$fk_iddoctor, $fecha, $clientellamado, $servicioexpress,$fk_idusuario,$estado, $agendadetalle;
  private $table = "agenda";
  function __construct()//$_id,$_nombre,$_descripcion,$_status
  {
  }
  public function getIdAgenda(){return $this->idagenda;}
  public function setIdAgenda($param){$this->idagenda = $param;}
  public function getFk_IdCliente(){return $this->fk_idcliente;}
  public function setFk_IdCliente($param){$this->fk_idcliente = $param;}
  public function getFk_IdDoctor(){return $this->fk_iddoctor;}
  public function setFk_IdDoctor($param){$this->fk_iddoctor = $param;}
  public function getFecha(){return $this->fecha;}
  public function setFecha($param){$this->fecha = $param;}
  public function getClientellamado(){return $this->clientellamado;}
  public function setClientellamado($param){$this->clientellamado = $param;}
  public function getServicioExpress(){return $this->servicioexpress;}
  public function setServicioExpress($param){$this->servicioexpress = $param;}
  public function getFk_idUsuario(){return $this->fk_idusuario;}
  public function setFk_idUsuario($param){$this->fk_idusuario = $param;}
  public function getEstado(){return $this->estado;}
  public function setEstado($param){$this->estado = $param;}
  public function getAgendaDetalle(){return $this->agendadetalle;}
  public function setAgendaDetalle($param){$this->agendadetalle = $param;}

 
 public function insert(){
    $ex   = false;
    $res  = null;
    $this->do_open();
    $full = array();
    $query="
    INSERT INTO agenda (fk_idcliente,fk_iddoctor, fecha, clientellamado, servicioexpress, fk_idusuario, estado) VALUES(
    '".$this->getFk_idCliente()."',
    '".$this->getFk_idDoctor()."',
    '".$this->getFecha()."',
    '".$this->getClientellamado()."',
    '".$this->getServicioExpress()."',
    '".$this->getFk_idUsuario()."',
    '".$this->getEstado()."'
    );";

    $actionlog = array(
      'query' => $query,
      'table' => "agenda",
      'action' => "insert"
    );
    $full[0] = $actionlog;

   // for ($i = 0; $i < count($POST['Estado']); $i++) {
   //   $query.$i = "
   //   INSERT INTO agendadetalle (fk_idAgenda, fk_Medicamento, cantidad, dosis, facturar, estado) 
   //   VALUES (
   //   '".$ultimoIdAgenda."',
   //   '".$POST['fk_Medicamento'][$i]."',
   //   '".$POST['Cantidad'][$i]."', 
   //   '".$POST['Dosis'][$i]."', 
   //   '".$POST['Facturar'][$i]."', 
   //   '".$POST['Estado'][$i]."')";     
       
   //   $actionlog.$i = array(
   //     'query' => $query.$i,
   //     'table' => "agendadetalle",
   //     'action' => "insert"
   //   );
   //   $full[$i+1] = $actionlog.$i;
   //}

    //$query2 = "
    //INSERT INTO agendadetalle (fk_idAgenda, fk_Medicamento, cantidad, dosis, facturar, estado) 
    //VALUES (
    //'".$ultimoIdAgenda."',
    //'".$POST['Fk_Medicamento']."',
    //'".$POST['Cantidad']."', 
    //'".$POST['Dosis']."', 
    //'".$POST['Facturar']."', 
    //'".$POST['Estado']."')";     
       
    //$actionlog2 = array(
    //  'query' => $query2,
    //  'table' => "agendadetalle",
    //  'action' => "insert"
    //);
    //$full[1] = $actionlog2;
    $ex = false;
    $res = $this->do_actionLog($full);
    if ($res) {
        $ex = true;
    }
    $this->do_close();
    return $ex;
  }


public function getlastid(){

   $query = "SELECT MAX(IdAgenda) as id_agenda FROM agenda";
   $this->do_open();
    $res = $this->do_query($query);
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_object()) {//para parsear el resultado del select
         $resultSet[]=$row;
      }
    }else{$resultSet = null;}
    $this->do_close();
    return $resultSet;
}
  public function getBy($_idAgenda){
    $query = "
    SELECT a.IdAgenda, a.fk_idCliente, a.fk_idDoctor, DATE_FORMAT(a.fecha,'%d/%m/%Y') as Fecha, a.Clientellamado, 
      a.ServicioExpress, a.fk_idUsuario, a.estado, 
      e.descripcion as NombreEstado,
      p.Nombre as NombreCliente,
      p.Apellidos as ApellidosCliente,
      p.telefono as TelefonoCliente,
      pc.Nombre as NombreDoctor
    FROM agenda a, doctor d, estado e, cliente c, persona p, persona pc
    WHERE a.estado= e.idEstado and 
    a.fk_idCliente=c.IdCliente and
    c.IdPersona=p.IdPersona and
    a.fk_idDoctor = d.IdDoctor and
    d.IdPersona=pc.IdPersona and
    a.idagenda = ".$_idAgenda;
    $this->do_open();
    $res = $this->do_query($query);
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_object()) {//para parsear el resultado del select
         $resultSet[]=$row;
      }
    }else{$resultSet = null;}
    $this->do_close();
    return $resultSet;
  }

public function getDetIdAgenda($_idAgenda){
    $query = "
    SELECT a.ItemId, a.Fk_idAgenda, a.fk_Medicamento, a.Cantidad, a.Dosis, a.Facturar, a.Estado, 
      e.descripcion as NombreEstado,
      m.NombreMedicamento
    FROM agendadetalle a, estado e, medicamento m
    WHERE a.estado= e.idEstado and 
    a.fk_Medicamento=idMedicamento and
    a.fk_idagenda = ".$_idAgenda;
    $this->do_open();
    $res = $this->do_query($query);
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_object()) {//para parsear el resultado del select
         $resultSet[]=$row;
      }
    }else{$resultSet = null;}
    $this->do_close();
    return $resultSet;
  }

  public function getByFecha($_fecha){
    $query = "
    SELECT a.IdAgenda, a.fk_idCliente, a.fk_idDoctor, DATE_FORMAT(a.fecha,'%d/%m/%Y') as Fecha, a.Clientellamado, 
      a.ServicioExpress, a.fk_idUsuario, a.estado, 
      e.descripcion as NombreEstado,
      p.Nombre as NombreCliente,
      p.Apellidos as ApellidosCliente,
      p.telefono as TelefonoCliente,
      pc.Nombre as NombreDoctor
    FROM agenda a, doctor d, estado e, cliente c, persona p, persona pc
    WHERE a.estado= e.idEstado and 
    a.fk_idCliente=c.IdCliente and
    c.IdPersona=p.IdPersona and
    a.fk_idDoctor = d.IdDoctor and
    d.IdPersona=pc.IdPersona and
    a.fecha = ".$_fecha;
    $this->do_open();
    $res = $this->do_query($query);
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_object()) {//para parsear el resultado del select
         $resultSet[]=$row;
      }
    }else{$resultSet = null;}
    $this->do_close();
    return $resultSet;
  }


  public function getAll(){
    $query = "
    SELECT a.IdAgenda, a.fk_idCliente, a.fk_idDoctor, DATE_FORMAT(a.fecha,'%d/%m/%Y') as Fecha, a.Clientellamado, 
      a.ServicioExpress, a.fk_idUsuario, a.estado, 
      e.descripcion as NombreEstado,
      p.Nombre as NombreCliente,
      p.Apellidos as ApellidosCliente,
      p.telefono as TelefonoCliente,
      pc.Nombre as NombreDoctor
    FROM agenda a, doctor d, estado e, cliente c, persona p, persona pc
    WHERE a.estado= e.idEstado and 
    a.fk_idCliente=c.IdCliente and
    c.IdPersona=p.IdPersona and
    a.fk_idDoctor = d.IdDoctor and
    d.IdPersona=pc.IdPersona";
    $this->do_open();
    $res = $this->do_query($query);
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_object()) {//para parsear el resultado del select
         $resultSet[]=$row;
      }
    }else{$resultSet = null;}
    $this->do_close();
    return $resultSet;
  }

  public function getAllClientes(){
    $query = "SELECT a.IdCliente, a.idPersona, b.Nombre, b.Apellidos
      from cliente a , persona b
      where a.idPersona= b.idPersona and".ROLL_STATUS; 
    $this->do_open();
    $res = $this->do_query($query);
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_object()) {//para parsear el resultado del select
         $resultSet[]=$row;
      }
    }else{$resultSet = null;}
    $this->do_close();
    return $resultSet;
  }

  public function getAllMedicamentos(){
    $query = "SELECT a.idMedicamento, a.nombreMedicamento
      from medicamento a ";
    $this->do_open();
    $res = $this->do_query($query);
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_object()) {//para parsear el resultado del select
         $resultSet[]=$row;
      }
    }else{$resultSet = null;}
    $this->do_close();
    return $resultSet;
  }


  public function getAllDoctores(){
    $query = "SELECT a.IdDoctor, a.idPersona, b.Nombre, b.Apellidos
      from doctor a , persona b
      where a.idPersona= b.idPersona and".ROLL_STATUS; 
    $this->do_open();
    $res = $this->do_query($query);
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_object()) {//para parsear el resultado del select
         $resultSet[]=$row;
      }
    }else{$resultSet = null;}
    $this->do_close();
    return $resultSet;
  }

  public function update(){
    $ex = false;
    $query =
    " UPDATE agenda
     SET fk_idcliente   =".$this->getFk_idCliente().",
     fk_idDoctor        =".$this->getFk_idDoctor().",
     fecha              ='".$this->getFecha()."',
     clientellamado     =".$this->getClientellamado().",
     servicioexpress    =".$this->getServicioExpress().",
     estado             =".$this->getEstado()."
     WHERE idagenda    =".$this->getIdAgenda();
    $this->do_open();
    $res = $this->do_query($query);
    if ($res) {//todo bien
      $ex = true;
      $this->do_commit();
     //guardar en logs
    }

    $this->do_close();
    return  $query ;
  }

}

?>
