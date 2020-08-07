<?php namespace App\Models;

use CodeIgniter\Model;

class Inscrito extends Model{
    protected $table = 'inscritos';
    protected $primaryKey = 'idInscrito';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $allowFileds = ['idInscrito', 'grupo_idGrupo', 'alumnos_curp', 'pagos_idPago'];

    public function getListar(){
        return $this->db->query('CALL sp_enlins()')->getResultArray();
    }

    public function buscarT($b, $e){
        if($b != null && $e){
            return $this->db->query("SELECT idInscrito, nombre_curso, nombreAlumno, apellido1, 
            apellido2, pago, estatusP from inscritos JOIN grupo ON inscritos.grupo_idGrupo = grupo.idGrupo 
            JOIN cursos ON grupo.cursos_idCursos = cursos.idCursos 
            JOIN alumnos ON inscritos.alumnos_curp = alumnos.curp 
            JOIN pagos ON inscritos.pagos_idPago = pagos.idPago
            WHERE concat(nombreAlumno,' ',apellido1,' ',apellido2) LIKE '%".$b."%' 
            AND estatusP ='".$e."' OR nombreAlumno LIKE '%".$b."%' AND estatusP ='".$e."' 
            OR apellido1 LIKE '%".$b."%' AND estatusP ='".$e."'
            OR apellido2 LIKE '%".$b."%' AND estatusP ='".$e."' OR cpAl LIKE '%".$b."%'
            AND estatusP ='".$e."' OR nombre_curso LIKE '%".$b."%' AND estatusP ='".$e."'")->getResultArray();
        }else if($b != null){
            return $this->db->query("SELECT idInscrito, nombre_curso, nombreAlumno, apellido1, 
            apellido2, pago, estatusP from inscritos JOIN grupo ON inscritos.grupo_idGrupo = grupo.idGrupo 
            JOIN cursos ON grupo.cursos_idCursos = cursos.idCursos 
            JOIN alumnos ON inscritos.alumnos_curp = alumnos.curp 
            JOIN pagos ON inscritos.pagos_idPago = pagos.idPago
            WHERE concat(nombreAlumno,' ',apellido1,' ',apellido2) LIKE '%".$b."%' 
            OR nombreAlumno LIKE '%".$b."%' OR apellido1 LIKE '%".$b."%' 
            OR apellido2 LIKE '%".$b."%'  OR cpAl LIKE '%".$b."%' 
            OR nombre_curso LIKE '%".$b."%'")->getResultArray();
        }else if($e != null){
            return $this->db->query("SELECT idInscrito, nombre_curso, nombreAlumno, apellido1, 
            apellido2, pago, estatusP from inscritos JOIN grupo ON inscritos.grupo_idGrupo = grupo.idGrupo 
            JOIN cursos ON grupo.cursos_idCursos = cursos.idCursos 
            JOIN alumnos ON inscritos.alumnos_curp = alumnos.curp 
            JOIN pagos ON inscritos.pagos_idPago = pagos.idPago
            WHERE estatusP ='".$e."'")->getResultArray();
        }
    }

    public function guardar($data){
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_updinst(?, ?, ?, ?)', $data)->getResultArray();
        }else{
            $msj = $this->db->query('CALL sp_addinsc(?, ?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function buscarR($id){
        return $this->db->query('CALL sp_businst(?)', $id)->getResultArray();
    }
}