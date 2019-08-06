<?php
/**
 *
 */
class cls_persona extends cls_conexion
{
  private $idpersona,$cedula,$nombre,$apellidos,$telefono,$direccion,$fecha_nacimiento,$estado;
  private $table = "persona";
  function __construct()//$_id,$_nombre,$_descripcion,$_status
  {
  }
  public function getIdPersona(){return $this->idpersona;}
  public function setIdPersona($param){$this->idpersona = $param;}
  public function getCedula(){return $this->cedula;}
  public function setCedula($param){$this->cedula=$param;}
  public function getNombre(){return $this->nombre;}
  public function setNombre($param){$this->nombre = $param;}
  public function getApellidos(){return $this->apellidos;}
  public function setApellidos($param){$this->apellidos = $param;}
  public function getTelefono(){return $this->telefono;}
  public function setTelefono($param){$this->telefono = $param;}
  public function getDireccion(){return $this->direccion;}
  public function setDireccion($param){$this->direccion = $param;}
  public function getFecha_nacimiento(){return $this->fecha_nacimiento;}
  public function setFecha_nacimiento($param){$this->fecha_nacimiento = $param;}
  public function getEstado(){return $this->estado;}
  public function setEstado($param){$this->estado = $param;}
  
 
  public function insert(){
    $ex   = false;
    $res  = null;
    $this->do_open();
    $query="
    INSERT INTO persona (cedula,nombre,apellidos, telefono, direccion, fecha_nacimiento, estado) VALUES(
    '".$this->getCedula()."',
    '".$this->getNombre()."',
    '".$this->getApellidos()."',
    '".$this->getTelefono()."',
    '".$this->getDireccion()."',
    '".$this->getFecha_nacimiento()."',
    '".$this->getEstado()."'
    );";
    $actionlog = array(
      'query' => $query,
      'table' => $this->table,
      'action' => "insert"
    );
    $mylist[0]=$actionlog;
    $ex = false;
    $res = $this->do_actionLog($mylist);
    if ($res) {
      $ex = true;
    }
    $this->do_output(1213);
    $this->do_close();
    return $ex;
  }

  public function getBy($_idPersona){
    $query = "
    SELECT a.IdPersona, a.Cedula, a.Nombre, a.Apellidos, a.Telefono, a.Direccion,
      DATE_FORMAT(a.fecha_nacimiento,'%d/%m/%Y') as Fecha_nacimiento, a.Estado, b.descripcion as NombreEstado
    FROM persona a, estado b
    WHERE a.estado= b.idEstado and 
    idpersona = ".$_idPersona;
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

  public function existeCedula($_Cedula){
    $existe = false;
    $query = "
    SELECT IdPersona, Cedula, Nombre, Apellidos, Telefono, Direccion,
      DATE_FORMAT(fecha_nacimiento,'%d/%m/%Y') as Fecha_nacimiento, Estado
    FROM persona
    WHERE
    cedula = ".$_Cedula;
    $this->do_open();
    $res = $this->do_query($query);
    if ($res->num_rows > 0) {
      $existe=true;}
    $this->do_close();
    return $existe;
  }



  public function getAll(){
    $query = "SELECT a.IdPersona, a.Cedula, a.Nombre, a.Apellidos, a.Telefono, a.Direccion,
      DATE_FORMAT(a.fecha_nacimiento,'%d/%m/%Y') as Fecha_nacimiento, Estado, b.descripcion as NombreEstado
      from persona a, estado b where a.estado=b.idEstado and".ROLL_STATUS; 
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
    " UPDATE persona
     SET cedula   ='".$this->getCedula()."',
     nombre       ='".$this->getNombre()."',
     apellidos    ='".$this->getApellidos()."',
     telefono     ='".$this->getTelefono()."',
     direccion    ='".$this->getDireccion()."',
     fecha_nacimiento ='".$this->getFecha_nacimiento()."',
     estado       =".$this->getEstado()."
     WHERE idpersona  =".$this->getIdPersona();
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
