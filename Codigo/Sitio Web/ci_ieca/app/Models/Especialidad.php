<?php namespace App\Models;

use CodeIgniter\Model;

Class Especialidad extends Model{
    protected $table = 'especialidad';
    protected $primaryKey = 'idEspInst';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deteledField = 'deleted_at';

    protected $allowFields = ['idEspInst', 'especialidad', 'descripcionEsp'];

    public function getListar(){
        return $this->db->query('CALL sp_enlesp()')->getResultArray();
    }

    public function buscarT($b){
        return $this->db->query("SELECT idEspInst, especialidad, descripcionEsp FROM especialidad WHERE especialidad LIKE '%".$b."%'")->getResultArray();
    }

    public function guardar($data){
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_updesp(?, ?, ?)', $data)->getResultArray();
        }else{
            $msj = $this->db->query('CALL sp_addesp(?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function buscarR($id){
        return $this->db->query('CALL sp_busesp(?)', $id)->getResultArray();
    }

}