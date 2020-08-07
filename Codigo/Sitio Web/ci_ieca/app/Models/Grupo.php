<?php namespace App\Models;

use CodeIgniter\Model;

class Grupo extends Model{
    protected $table = 'grupo';
    protected $primaryKey = 'idGrupo';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $allowFields = ['idGrupo', 'cursos_idCursos', 'aulas_idAula', 'estatusGr', 'cupo'];

    public function getListar(){
        return $this->db->query('CALL sp_enlgpo()')->getResultArray();
    }

    public function buscarT($b, $i, $f, $e){
        if($b != null && $i != null && $f != null && $e != null){
            return $this->db->query("SELECT idGrupo, nombre_curso, fechaInicio, fechaTermino, estatusGr 
            FROM grupo JOIN cursos ON grupo.cursos_idCursos = cursos.idCursos 
            WHERE nombre_curso LIKE '%".$b."%' 
            AND fechaInicio  >='".$i."' AND fechaTermino <= '".$f."'
            AND estatusGr ='".$e."'")->getResultArray();
        }else if($b != null && $i != null && $e != null){
            return $this->db->query("SELECT idGrupo, nombre_curso, fechaInicio, fechaTermino, estatusGr 
            FROM grupo JOIN cursos ON grupo.cursos_idCursos = cursos.idCursos 
            WHERE nombre_curso LIKE '%".$b."%'
            AND fechaInicio >='".$i."' AND estatusGr ='".$e."'")->getResultArray();
        }else if($b != null && $f != null && $e != null){
            return $this->db->query("SELECT idGrupo, nombre_curso, fechaInicio, fechaTermino, estatusGr 
            FROM grupo JOIN cursos ON grupo.cursos_idCursos = cursos.idCursos 
            WHERE nombre_curso LIKE '%".$b."%' 
            AND fechaTermino <= '".$f."' AND estatusGr ='".$e."'")->getResultArray();
        }else if($b != null && $i != null ){
            return $this->db->query("SELECT idGrupo, nombre_curso, fechaInicio, fechaTermino, estatusGr 
            FROM grupo JOIN cursos ON grupo.cursos_idCursos = cursos.idCursos 
            WHERE nombre_curso LIKE '%".$b."%'
            AND fechaInicio >='".$i."'")->getResultArray();
        }else if($b != null && $f != null){
            return $this->db->query("SELECT idGrupo, nombre_curso, fechaInicio, fechaTermino, estatusGr 
            FROM grupo JOIN cursos ON grupo.cursos_idCursos = cursos.idCursos 
            WHERE nombre_curso LIKE '%".$b."%' 
            AND fechaTermino <= '".$f."'")->getResultArray();
        }else if($i != null && $f != null && $e != null){
            return $this->db->query("SELECT idGrupo, nombre_curso, fechaInicio, fechaTermino, estatusGr 
            FROM grupo JOIN cursos ON grupo.cursos_idCursos = cursos.idCursos WHERE fechaInicio >='".$i."' 
            AND fechaTermino <= '".$f."' AND estatusGr ='".$e."'")->getResultArray();
        }else if($i != null && $f != null){
            return $this->db->query("SELECT idGrupo, nombre_curso, fechaInicio, fechaTermino, estatusGr 
            FROM grupo JOIN cursos ON grupo.cursos_idCursos = cursos.idCursos WHERE fechaInicio >='".$i."' 
            AND fechaTermino <= '".$f."'")->getResultArray();
        }else if($b != null){
            return $this->db->query("SELECT idGrupo, nombre_curso, fechaInicio, fechaTermino, estatusGr 
            FROM grupo JOIN cursos ON grupo.cursos_idCursos = cursos.idCursos 
            WHERE nombre_curso 
            LIKE '%".$b."%' OR nombre_curso LIKE '%".$b."%'")->getResultArray();
        }else if($i != null){
            return $this->db->query("SELECT idGrupo, nombre_curso, fechaInicio, fechaTermino, estatusGr 
            FROM grupo JOIN cursos ON grupo.cursos_idCursos = cursos.idCursos WHERE fechaInicio >='".$i."'")->getResultArray();
        }else if($f != null){
            return $this->db->query("SELECT idGrupo, nombre_curso, fechaInicio, fechaTermino, estatusGr 
            FROM grupo JOIN cursos ON grupo.cursos_idCursos = cursos.idCursos WHERE fechaTermino <= '".$f."'")->getResultArray();
        }else if($e != null){
            return $this->db->query("SELECT idGrupo, nombre_curso, fechaInicio, fechaTermino, estatusGr 
            FROM grupo JOIN cursos ON grupo.cursos_idCursos = cursos.idCursos WHERE estatusGr ='".$e."'")->getResultArray();
        }
    }

    public function guardar($data){
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_addgpo(?, ?, ?, ?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function actualizar($data){
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_updgpo(?, ?, ?, ?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function buscarR($id){
        return $this->db->query('CALL sp_busgru(?)', $id)->getResultArray();
        
    }
}