<?php
/**
 *
 */
class cls_agendadetalle extends cls_conexion
{
  private $fk_idAgenda,$fk_Medicamento,$Cantidad, $Dosis, $Facturar, $estado;
  private $table = "agendadetalle";
  function __construct()//$_id,$_nombre,$_descripcion,$_status
  {
  }
  public function getFk_IdAgenda(){return $this->fk_idagenda;}
  public function setFk_IdAgenda($param){$this->fk_idagenda = $param;}
  public function getFk_Medicamento(){return $this->fk_medicamento;}
  public function setFk_Medicamento($param){$this->fk_medicamento = $param;}
  public function getCantidad(){return $this->cantidad;}
  public function setCantidad($param){$this->cantidad = $param;}
  public function getDosis(){return $this->dosis;}
  public function setDosis($param){$this->dosis = $param;}
  public function getFacturar(){return $this->facturar;}
  public function setFacturar($param){$this->facturar = $param;}
  public function getEstado(){return $this->estado;}
  public function setEstado($param){$this->estado = $param;}
  
 
  public function insert(){
    $ex   = false;
    $res  = null;
    $this->do_open();
    $query="
    INSERT INTO agendadetalle (fk_idagenda, fk_Medicamento,cantidad,dosis,facturar, estado) VALUES(
    '".$this->getFk_IdAgenda()."',
    '".$this->getFk_Medicamento()."',
    '".$this->getCantidad()."',
    '".$this->getDosis()."',
    '".$this->getFacturar()."',
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
    }//else{$this->do_roolback();}
    $this->do_output(1213);
    $this->do_close();
    return $ex;
  }

  public function getByIdAgenda($_idAgenda){
    $query = "
    SELECT a.itemId, a.fk_idAgenda, a.fk_Medicamento, a.Cantidad, a.Dosis, a.facturar, a.Estado,
    m.nombremedicamento as NombreMedicamento, e.descripcion as NombreEstado
    FROM agendadetalle a, medicamento m, estado e
    WHERE a.fk_Medicamento=m.idMedicamento and a.estado= e.idEstado and 
    fk_idAgenda = ".$_idAgenda;
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

  public function getByItemId($_itemId){
    $query = "
    SELECT a.itemId, a.fk_idAgenda, a.fk_Medicamento, a.Cantidad, a.Dosis, a.facturar, a.Estado,
    m.nombremedicamento as NombreMedicamento, e.descripcion as NombreEstado
    FROM agendadetalle a, medicamento m, estado e
    WHERE a.fk_Medicamento=m.idMedicamento and a.estado= e.idEstado and 
    itemId = ".$_itemId;
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
    $query =
    " UPDATE agendadetalle
     SET Fk_idAgenda   ='".$this->getFk_IdAgenda()."',
     Fk_Medicamento    ='".$this->getFk_Medicamento()."',
     Cantidad          ='".$this->getCantidad()."',
     Dosis             ='".$this->getDosis()."',
     Facturar          ='".$this->getFacturar()."',
     estado            ='".$this->getEstado()."
     WHERE itemId  =".$this->getItemId();
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
