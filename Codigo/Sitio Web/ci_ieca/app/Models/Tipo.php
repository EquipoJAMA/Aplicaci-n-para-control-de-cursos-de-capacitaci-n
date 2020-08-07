<?php namespace App\Models;

use CodeIgniter\Model;

class Tipo extends Model{
    protected $table = 'tipo';
    protected $primaryKey = 'idTipInst';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $allowFields = ['idTipInts', 'tipo', 'descripcionTip'];

    public function getListar(){
        return $this->db->query('CALL sp_enltip()')->getResultArray();
    }

    public function buscarT($b){
        return $this->db->query("SELECT idTipInst, tipo, descripcionTip FROM tipo WHERE tipo LIKE '%".$b."%'")->getResultArray();
    }

    public function guardar($data){
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_updtip(?, ?, ?)', $data)->getResultArray();
        }else{
            $msj = $this->db->query('CALL sp_addtip(?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function buscarR($id){
        return $this->db->query('CALL sp_bustip(?)', $id)->getResultArray();
    }
}