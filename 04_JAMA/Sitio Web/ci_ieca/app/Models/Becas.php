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
}