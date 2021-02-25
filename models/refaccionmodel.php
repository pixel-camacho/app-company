<?php

class RefaccionModel extends Model implements IModel {

private $idRefaccion;
private $pieza;
private $cantidad;
private $multifuncional;

function __construct(){
    parent::__construct();
    $this->idRefaccion = '';
    $this->pieza = '';
    $this->cantidad = '';
    $this->multifuncional = '';
}

//SET
public function setIdRefaccion($idRefaccion) { $this->idRefaccion = $idRefaccion;}
public function setPieza($pieza){ $this->pieza = $pieza;}
public function setCantidad($cantidad) { $this->cantidad = $cantidad; }
public function setMultifuncional($multifuncional){ $this->multifuncional = $multifuncional; }

//GET
public function getIdRefaccion() { return $this->idRefaccion; }
public function getPieza (){ return $this->pieza; }
public function getCantidad() {return $this->cantidad; }
public function getMultifuncional() { return $this->multifuncional; }

public function save(){
    try {
        $query = $this->prepare('INSET INTO refaccion (pieza,cantidad,multifuncional) VALUES (:pieza,:cantidad,:multifuncional)');
        $query->execute([
            'pieza' => $this->pieza,
            'cantidad' => $this->cantidad,
            'multifuncional' => $this->multifuncional
            ]);
            return true;
    } catch (PDOException $e) {
        error_log('REFACCIONESMODEL::save->PDOException '.$e);
        return false;
    }
}

public function getAll(){
    $items = [];

    try {
        $query = $this->query('SELECT * FROM refaccion');

        while($p = $query->fetch(PDO::FETCH_ASSOC)){
            $item = new RefaccionModel();
            $item->setIdRefaccion($p['idRefaccion']);
            $item->setPieza($p['pieza']);
            $item->setCantidad($p['cantidad']);
            $item->setMultifuncional($p['multifuncional']);
    
            array_push($items,$item);
        }
        return $items;
    } catch (PDOException $e) {
        error_log('REFACCIONESMODEL::getAll->PDOException '.$e);
        return false;
    }
}

public function get($idRefaccion){
    try {
        $query = $this->prepare('SELECT * FROM refaccion WHERE idRefaccion = :idRefaccion');
        $query->execute(['idRefaccion' => $idRefaccion]);

        $refaccion = $query->fetch(PDO::FETCH_ASSOC);
        $this->setIdRefaccion($refaccion['idRefaccion']);
        $this->setPieza($refaccion['pieza']);
        $this->setCantidad($refaccion['cantidad']);
        $this->setMultifuncional($refaccion['multifuncional']);

        return $this;
        
    } catch (PDOException $e) {
        error_log('REFACCIONESMODEL::get->PDOException '.$e);
    }

}

public function delete($idRefaccion){
    try {
        $query = $this->prepare('DELETE FROM refaccion WHERE idRefaccion = :idRefaccion');
        $query->execute(['idRefaccion' => $idRefaccion]);
        return true;
    } catch (PDOException $e) {
        error_log('REFACCIONESMODEL::delete->PDOException '.$e);
        return false;
    }
}

public function update(){
    try {
        $query = $this->prepare('UPDATE refaccion SET pieza = :pieza, cantida = :cantidad, multifuncional = :multifuncional WHERE idRefaccion = :idRefaccion');
        $query->execute([
            'idRefaccion' => $this->idRefaccion,
            'pieza' => $this->pieza,
            'cantidad' => $this->cantidad,
            'multifuncional' => $this->multifuncional
        ]);
        return true;
    } catch (PDOException $e) {
        error_log('REFACCIONESMODEL::update->PDOException '.$e);
        return false;
    }
}

public function from($array){
     $this->idRefaccion = $array['idRefaccion'];
     $this->pieza = $array['pieza'];
     $this->cantidad = $array['cantidad'];
     $this->multifuncional = $array['multifuncional'];
}



}

?>