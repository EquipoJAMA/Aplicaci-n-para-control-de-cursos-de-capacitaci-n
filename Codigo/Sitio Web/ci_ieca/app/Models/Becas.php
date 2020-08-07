<?php namespace App\Models;

use CodeIgniter\Model;

class Becas extends Model{
    protected $table = 'becas';
    protected $primaryKey = 'idBeca';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $allowFields = ['idBeca', 'nomBeca', 'mondes'];

    public function getListar(){
        return $this->db->query('CALL sp_lisbec()')->getResultArray();
    }

    public function buscarT($b){
        if($b != null){
            return $this->db->query("SELECT idBeca, nomBeca, mondes FROM becas 
            WHERE nomBeca LIKE '%".$b."%'")->getResultArray();
        }
    }

    public function guardar($data){
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_addbec(?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function actualizar($data){
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_updbeca(?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function buscarR($id){
        return $this->db->query('CALL sp_busbec(?)', $id)->getResultArray();
    }
}