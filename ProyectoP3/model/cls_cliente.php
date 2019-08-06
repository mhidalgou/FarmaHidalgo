<?php
/**
 *
 */
class cls_cliente extends cls_conexion
{
  private $idCliente,$idPersona,$estado;
  private $table = "cliente";
  function __construct()//$_id,$_nombre,$_descripcion,$_status
  {
  }
  public function getIdCliente(){return $this->idcliente;}
  public function setIdCliente($param){$this->idcliente = $param;}
  public function getIdPersona(){return $this->idpersona;}
  public function setIdPersona($param){$this->idpersona = $param;}
  public function getEstado(){return $this->estado;}
  public function setEstado($param){$this->estado = $param;}
  
 
  public function insert(){
    $ex   = false;
    $res  = null;
    $this->do_open();
    $query="
    INSERT INTO cliente (idpersona, estado) VALUES(
    '".$this->getIdPersona()."',
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

  public function getBy($_idCliente){
    $query = "
    SELECT a.idPersona, a.IdCliente, b.Nombre, b.Apellidos, a.Estado, c.descripcion as NombreEstado
    FROM cliente a, persona b, estado c
    WHERE a.idPersona=b.idPersona and a.estado= c.idEstado and 
    idCliente = ".$_idCliente;
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

  public function existeCedula($_IdPersona){
    $existe = false;
    $query = "
    SELECT IdPersona
    FROM cliente
    WHERE idPersona = ".$_IdPersona;
    $this->do_open();
    //var_dump($query);
    $res = $this->do_query($query);
    if ($res->num_rows > 0) {
      $existe=true;}
    $this->do_close();
    return $existe;
  }



  public function getAll(){
    $query = "SELECT a.IdPersona, a.IdCliente, b.Nombre, b.Apellidos, a.Estado, c.descripcion as NombreEstado
      from cliente a, persona b, estado c 
      where a.idpersona=b.idpersona and a.estado=c.idEstado and".ROLL_STATUS; 
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

  public function getAllPersonas(){
    $query = "SELECT a.IdPersona, a.Nombre, a.Apellidos
      from persona a 
      where ".ROLL_STATUS; 
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
    " UPDATE cliente
     SET estado       =".$this->getEstado()."
     WHERE idCliente  =".$this->getIdCliente();
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
