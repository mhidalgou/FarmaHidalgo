<?php
/**
 *
 */
class cls_servicio extends cls_conexion
{
  private $id,$nombre,$descripcion,$status;
  private $table = "servicio";
  function __construct()//$_id,$_nombre,$_descripcion,$_status
  {
  }
  public function getId(){return $this->id;}
  public function setId($param){$this->id = $param;}
  public function getNombre(){return $this->nombre;}
  public function setNombre($param){$this->nombre = $param;}
  public function getDescripcion(){return $this->descripcion;}
  public function setDescripcion($param){$this->descripcion = $param;}
  public function getStatus(){return $this->status;}
  public function setStatus($param){$this->status = $param;}

  public function insert(){
    $ex   = false;
    $res  = null;
    $this->do_open();
    $query="
    INSERT INTO servicio (nombre,descripcion,status) VALUES(
    '".$this->getNombre()."',
    '".$this->getDescripcion()."',
    ".$this->getStatus()."
    );";
    $actionlog = array(
      'query' => $query,
      'table' => $this->table,
      'action' => "insert"
    );
    $ex = false;
    $res = $this->do_actionLog($actionlog);
    if ($res) {
      $ex = true;
    }
    $this->do_output(1213);
    $this->do_close();
    return $ex;
  }
  public function getBy($_id){
    $query = "
    SELECT *
    FROM servicio
    WHERE
    id = ".$_id;
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
    $query = "SELECT * FROM servicio WHERE ".ROLL_STATUS;
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
    " UPDATE servicio
     SET nombre   ='".$this->getNombre()."',
     descripcion  ='".$this->getDescripcion()."',
     status       =".$this->getStatus()."
     WHERE id     =".$this->getId();
    $this->do_open();
    $res = $this->do_query($query);
    if ($res) {//todo bien
      $ex = true;
      $this->do_commit();
     //guardar en logs
    }

    $this->do_close();
    return $res;
  }

}

?>
