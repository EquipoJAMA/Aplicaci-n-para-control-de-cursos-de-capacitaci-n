<?php namespace App\Models;

use CodeIgniter\Model;

class TipoTelefono extends Model{
    protected $table = 'tipotel';
    protected $primaryKey = 'idTipTel';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $allowFields = ['idTipTel', 'tipoTelefono'];

    public function getListar(){
        return $this->db->query('CALL sp_enltptel()')->getResultArray();
    }
}