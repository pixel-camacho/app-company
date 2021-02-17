<?php


class TonnerModel extends Model implements IModel {

    private $idTonner;
    private $multifuncional;
    private $cantidad;

    function __construct(){
        parent::__construct();
        $this->id = '';
        $this->multifuncional = '';
        $this->cantidad = '';
    }

    //SET
    public function setId($idTonner){ $this->idTonner = $idTonner;}
    public function setMultifuncional($multifuncional){ $this->multifuncional = $multifuncional;}
    public function setCantidad($cantidad){ $this->cantidad = $cantidad;}

    //GET
    public function getId() {return $this->idTonner;}
    public function getMultifuncional(){ return $this->multifuncional;}
    public function getCantidad(){ return $this->cantidad;}

    public function save(){
        try {
            $query = $this->prepare('INSERT INTO tonner(multifuncional,cantidad) VALUES (:multifuncional,:cantidad)');
            $query->execute([
                'multifuncional' => $this->multifuncional,
                'cantidad' => $this->cantidad
            ]);
            return true;
        } catch (PDOException $e) {
            error_log('TONNERMODEL::Save->PDOException '.$e);
            return false;
        }
    }

     public function getAll(){
         $items = [];
         try {
             $query = $this->query('SELECT * FROM tonner');

             while($p = $query->fecth(PDO::FETCH_ASSOC)){
                 $item = new TonnerModel();
                 $item->setId($p['idTonner']);
                 $item->setMultifuncional($p['multifuncional']);
                 $item->setCantidad($p['cantidad']);

                 array_push($items,$item);
             }
             return $items;
         } catch (PDOException $e) {
             error_log('TONNERMODEL::Getall->PDOException '.$e);
             return false;
         }
     }

     public function get($idTonner){
         try {
            $query = $this->prepare('SELECT * FROM tonner WHERE idTonner = :idTonner');
            $query->execute([
                'idTonner' => $idTonner
            ]);
            $tonner = $query->fetch(PDO::FETCH_ASSOC);
            $this->setId($tonner['idTonner']);
            $this->setMultifuncional($tonner['multifuncional']);
            $this->setCantidad($tonner['cantidad']);

            return $this;
         } catch (PDOException $e) {
             error_log('TONNERMODEL::get->PDOException '.$e);
         }
     }

     public function delete($idTonner){
         try {
             $query = $this->query('DELETE FROM tonner WHERE idTonner = :idTonner');
             $query->execute(['idTonner' => $idTonner]);
             return true;
         } catch (PDOException $e) {
             error_log('TONNERMODEL::delete->PDOException '.$e);
             return false;
         }
     }

     public function update(){
         try {
             $query = $this->prepare('UPDATE tonner SET multifuncional = :multifuncional, cantidad = :cantidad WHERE  idTonner = :idTonner');
             $query->execute([
                 'idTonner' => $this->idTonner,
                 'multifuncional' => $this->multifuncional,
                 'cantidad' => $this->cantidad
             ]);
             return true;
         } catch (PDOException $e) {
             error_log('TONNERMODEL::update->PDOException '.$e);
             return false;
         }
     }

     public function from($array){
         $this->idTonner = $array['idTonner'];
         $this->multifuncional = $array['multifuncional'];
         $this->cantidad = $array['cantidad'];
     }

     public function exists($idTonner){

        try {
            $query = $this->prepare('SELECT idTonner FROM tonner WHERE idTonner = :idTonner');
            $query->execute(['idTonner' => $idTonner]);
            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            error_log('USERMODEL::exists-> PDOException '. $e);
            return false;
        }
    }


}


?>