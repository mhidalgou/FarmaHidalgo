<?php
/**
 *
 */

class cls_clientexservicio extends cls_conexion
{
  private $id,$idCliente,$idDetalleServicio,$status;
  private $table = "cliente_x_detalle_servicio";
  function __construct()//$_id,$_nombre,$_descripcion,$_status
  {
  }
  public function getId(){return $this->id;}
  public function setId($param){$this->id = $param;}
  public function getIdCliente(){return $this->idCliente;}
  public function setIdCliente($param){$this->idCliente = $param;}
  public function getIdDetalleServicio(){return $this->idDetalleServicio;}
  public function setIdDetalleServicio($param){$this->idDetalleServicio = $param;}
  public function getStatus(){return $this->status;}
  public function setStatus($param){$this->status = $param;}

  public function insert(){
    $ex   = false;
    $res  = null;
    $this->do_open();
    $full = array();

    $query="
    INSERT INTO `cliente_x_detalle_servicio`(`id_cliente`, `id_detalle_servicio`, `status`) VALUES(
    ".$this->getIdCliente().",
    ".$this->getIdDetalleServicio().",
    ".$this->getStatus()."
    );";
    $actionlog1 = array(
      'query' => $query,
      'table' => "cliente_x_detalle_servicio",
      'action' => "insert"
    );
    $query2="UPDATE detalle_servicio set status = 2 where id = ".$this->getIdDetalleServicio();
    $actionlog2 = array(
      'query' => $query2,
      'table' => "detalle_servicio",
      'action' => "update"
    );
    $full[0] = $actionlog1;
    $full[1] = $actionlog2;
    $ex = false;
    $res = $this->do_actionLog($full);
    if ($res) {

        $ex = true;

    }

    $this->do_close();
    return $ex;
  }
  public function getBy($_id){
    $query = "
    SELECT cds.id,c.nombre as cnombre,ds.nombre as dsnombre,cds.status
    FROM cliente_x_detalle_servicio cds
     inner join cliente c on c.id = cds.id_cliente
     inner join detalle_servicio ds on ds.ID = cds.id_detalle_servicio
     WHERE cds.id = ".$_id;
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
    SELECT cds.id,c.nombre as cnombre,ds.nombre as dsnombre,cds.status
    FROM cliente_x_detalle_servicio cds
     inner join cliente c on c.id = cds.id_cliente
     inner join detalle_servicio ds on ds.ID = cds.id_detalle_servicio
     WHERE cds.".ROLL_STATUS;
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
