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

    public function buscarT($b, $i, $f){
        if($b != null && $i != null && $f != null){
            return $this->db->query("SELECT idCursos, ins_idInstructor, nombre_curso, imgCurso, 
            fechaInicio, fechaTermino, descripcion, costo FROM cursos WHERE nombre_curso LIKE '%".$b."%' 
            AND fechaInicio  >='".$i."' AND fechaTermino <= '".$f."'")->getResultArray();
        }else if($b != null && $i != null){
            return $this->db->query("SELECT idCursos, ins_idInstructor, nombre_curso, imgCurso, 
            fechaInicio, fechaTermino, descripcion, costo FROM cursos WHERE nombre_curso LIKE '%".$b."%'
            AND fechaInicio >='".$i."'")->getResultArray();
        }else if($b != null && $f != null){
            return $this->db->query("SELECT idCursos, ins_idInstructor, nombre_curso, imgCurso, 
            fechaInicio, fechaTermino, descripcion, costo FROM cursos WHERE nombre_curso LIKE '%".$b."%' 
            AND fechaTermino <= '".$f."'")->getResultArray();
        }else if($i != null && $f != null){
            return $this->db->query("SELECT idCursos, ins_idInstructor, nombre_curso, imgCurso, 
            fechaInicio, fechaTermino, descripcion, costo FROM cursos WHERE fechaInicio >='".$i."' 
            AND fechaTermino <= '".$f."'")->getResultArray();
        }else if($b != null){
            return $this->db->query("SELECT idCursos, ins_idInstructor, nombre_curso, imgCurso, 
            fechaInicio, fechaTermino, descripcion, costo FROM cursos WHERE nombre_curso 
            LIKE '%".$b."%' OR nombre_curso LIKE '%".$b."%'")->getResultArray();
        }else if($i != null){
            return $this->db->query("SELECT idCursos, ins_idInstructor, nombre_curso, imgCurso, 
            fechaInicio, fechaTermino, descripcion, costo FROM cursos WHERE fechaInicio >='".$i."'")->getResultArray();
        }else if($f != null){
            return $this->db->query("SELECT idCursos, ins_idInstructor, nombre_curso, imgCurso, 
            fechaInicio, fechaTermino, descripcion, costo FROM cursos WHERE fechaTermino <= '".$f."'")->getResultArray();
        }
    }

    public function guardar($data){
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_addcur(?, ?, ?, ?, ?, ?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function actualizar($data){
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_updcur(?, ?, ?, ?, ?, ?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function buscarR($id){
        return $this->db->query('CALL sp_buscur(?)', $id)->getResultArray();
    }
}