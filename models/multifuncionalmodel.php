<?php

class MultifuncionalModel extends Model implements IModel {

    private $idMultifuncional;
    private $marca;
    private $modelo;
    private $cantidad;
    private $serie;
    private $image;

    function __construct(){
        parent::__construct();
        $this->idMultifuncional = '';
        $this->marca = '';
        $this->modelo = '';
        $this->cantidad = '';
        $this->serie = '';
        $this->image = '';
    }

    //SET
public function setIdMultifuncional($idMultifuncional) { $this->idMultifuncional = $idMultifuncional;}
public function setMarca($marca){ $this->marca = $marca;}
public function setModelo($modelo) { $this->modelo = $modelo; }
public function setCantidad($cantidad){ $this->cantidad = $cantidad; }
public function setSerie($serie){ $this->serie = $serie; }
public function setImage($image){ $this->image = $image; }

//GET
public function getIdMultifuncional() { return $this->idMultifuncional; }
public function getmarca (){ return $this->marca; }
public function getmodelo() {return $this->modelo; }
public function getCantidad() { return $this->cantidad; }
public function getSerie() { return $this->serie; }
public function getImagen() { return $this->image; }

    public function save(){
        try {
            $query = $this->prepare('INSET INTO multifuncional (marca,modelo,cantidad,serie,image) VALUES (:marca,:modelo,:cantidad,:serie,:image)');
            $query->execute([
                'marca' => $this->marca,
                'modelo' => $this->modelo,
                'cantidad' => $this->cantidad,
                'serie' => $this->serie,
                'image' => $this->image
                ]);
                return true;
        } catch (PDOException $e) {
            error_log('MULTIFUNCIONALMODEL::save->PDOException '.$e);
            return false;
        }
    }

    public function getAll(){
        $items = [];

        try {
            $query = $this->query('SELECT * FROM multifuncional');
    
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new MultifuncionalModel();
                $item->setIdMultifuncional($p['idMultifuncional']);
                $item->setMarca($p['marca']);
                $item->setModelo($p['modelo']);
                $item->setCantidad($p['cantidad']);
                $item->setSerie($p['serie']);
                $item->setImage($p['image']);
                
                array_push($items,$item);
            }
            return $items;
        } catch (PDOException $e) {
            error_log('MULTIFUNCIONALMODEL::getAll->PDOException '.$e);
            return false;
        }
    }

    public function getAllJSON(){

        try {
            $query = $this->query('SELECT * FROM multifuncional');
    
            while($p = $query->fetch(PDO::FETCH_ASSOC)){

                $items [] = $p;
            }
            return json_encode($items);
        } catch (PDOException $e) {
            error_log('MULTIFUNCIONALMODEL::getAllJSON->PDOException '.$e);
            return false;
        }

    }

    public function get($idMultifuncional){
        try {
            $query = $this->prepare('SELECT * FROM multifuncional WHERE idMultifuncional = :idMultifuncional');
            $query->execute(['idMultifuncional' => $idMultifuncional]);
    
            $multifuncional = $query->fetch(PDO::FETCH_ASSOC);
            $this->setIdMultifuncional($multifuncional['idMultifuncional']);
            $this->setMarca($multifuncional['marca']);
            $this->setModelo($multifuncional['modelo']);
            $this->setCantidad($multifuncional['cantidad']);
            $this->setSerie($multifuncional['serie']);
            $this->setImage($multifuncional['image']);
            
            return $this;
            
        } catch (PDOException $e) {
            error_log('MULTIFUNCIONALMODEL::get->PDOException '.$e);
        }
    }

    public function delete($idMultifuncional){
        try {
            $query = $this->prepare('DELETE FROM multifuncional WHERE idMultifuncional = :idMultifuncional');
            $query->execute(['idMultifuncional' => $idMultifuncional]);
            return true;
        } catch (PDOException $e) {
            error_log('MULTIFUNCIONALMODEL::delete->PDOException '.$e);
            return false;
        }
    }

    public function update(){
        try {
            $query = $this->prepare('UPDATE nultifuncional SET marca = :marca, 
                                                               modelo = :modelo,
                                                               cantidad = :cantidad,
                                                               serie = :serie,
                                                               image = :image WHERE idMultifuncional = :idMultifuncional');
            $query->execute([
                'idMultifuncional' => $this->idMultifuncional,
                'marca' => $this->marca,
                'modelo' => $this->modelo,
                'cantidad' => $this->cantidad,
                'serie' => $this->serie,
                'image' =>  $this->image
            ]);
            return true;
        } catch (PDOException $e) {
            error_log('MULTIFUNCIONALMODEL::update->PDOException '.$e);
            return false;
        }
    }

    public function from($array){
    $this->idMultifuncional = $array['idMultifuncional'];
     $this->marca = $array['marca'];
     $this->modelo = $array['modelo'];
     $this->cantidad = $array['cantidad'];
     $this->serie = $array['serie'];
     $this->image = $array['image'];

    }

}

?>