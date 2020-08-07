<?php namespace App\Models;

use CodeIgniter\Model;

class Aula extends Model{
    protected $table = 'aulas';
    protected $primaryKey = 'idAula';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $allowFields = ['idAula', 'nombreAula', 'estatusAula'];

    public function getListar(){
        return $this->db->query('CALL sp_enlaul()')->getResultArray();
    }

    public function buscarT($b, $e){
        if($b != null && $e != null){
            return $this->db->query("SELECT idAula, nombreAula, estatusAula FROM aulas WHERE nombreAula LIKE '%".$b."%' AND estatusAula ='".$e."'")->getResultArray();
        }else if($b != null){
            return $this->db->query("SELECT idAula, nombreAula, estatusAula FROM aulas WHERE nombreAula LIKE '%".$b."%'")->getResultArray();
        }else if($e != ""){
            return $this->db->query("SELECT idAula, nombreAula, estatusAula FROM aulas WHERE estatusAula ='".$e."'")->getResultArray();
        }
    }

    public function guardar($data){
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_updaul(?, ?, ?)', $data)->getResultArray();
        }else{
            $msj = $this->db->query('CALL sp_addaula(?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function buscarR($id){
        return $this->db->query('CALL sp_busaul(?)', $id)->getResultArray();
    }
}