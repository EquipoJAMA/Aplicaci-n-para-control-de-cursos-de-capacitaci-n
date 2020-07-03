<?php namespace App\Models;

use CodeIgniter\Model;

class Curso extends Model{
    protected $table = 'cursos';
    protected $primaryKey = 'idCursos';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $allowFields = ['idCurso', 'ins_idInstructor', 'nombre_curso', 'imgCurso', 'fechaInicio', 'fechaTermino', 'descripcion', 'costo'];

    public function getListar(){
        return $this->db->query('CALL sp_enlcur()')->getResultArray();
    }
}