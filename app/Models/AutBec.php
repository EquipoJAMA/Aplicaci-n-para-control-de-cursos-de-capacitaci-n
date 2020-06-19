<?php namespace App\Models;

use CodeIgniter\Model;

class AutBec extends Model{
    protected $table = 'autbec';
    protected $primaryKey = 'idaut';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $allowFields = ['autsol', 'pagosb_idPago', 'monpag'];

    public function getListar(){
        return $this->db->query('CALL sp_lisaut()')->getResultArray();
    }
}