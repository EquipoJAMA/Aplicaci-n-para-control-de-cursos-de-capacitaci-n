<?php namespace App\Models;

use CodeIgniter\Model;

class Administrador extends Model{
    protected $table = 'administrador';
    protected $primaryKey = 'idAmin';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $allowFields = ['nombreAdmin', 'apellidoP', 'apellidoM', 'nick', 'pass'];

    public function iniciarSesion($data){
        $query = $this->db->query("SELECT * FROM administrador WHERE nick = :nick: AND pass = :pass: ", [
            'nick' => $data['nick'],
            'pass' => $data['pass']
        ])->getResultArray();
        if($query != null){
            return $query;
        }else{
            return false;
        }
        
    }
}