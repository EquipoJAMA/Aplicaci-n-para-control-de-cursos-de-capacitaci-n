<?php namespace App\Models;

use CodeIgniter\Model;

class Telefono extends Model{
    protected $table = 'telefono';
    protected $primaryKey = 'idTel';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    
    protected $allowFields = ['idTel', 'tipoTel_idTipTel', 'telefono'];

    public function getListar(){
        return $this->db->query('CALL sp_enltel()')->getResultArray();
    }

    public function guardar($data){
        //var_dump($data);
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_updtel(?, ?, ?)', $data)->getResultArray();
        }else{
            $msj = $this->db->query('CALL sp_addtel(?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function buscarR($id){
        return $this->db->query('CALL sp_bustel(?)', $id)->getResultArray();
    }
}