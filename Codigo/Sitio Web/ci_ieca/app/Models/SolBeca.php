<?php namespace App\Models;

use CodeIgniter\Model;

class SolBeca extends Model{
    protected $table = 'solbeca';
    protected $primaryKey = 'idSol';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    
    protected $allowFields = ['idSol', 'solalu', 'becsol', 'estsol'];

    public function getListar(){
        return $this->db->query('CALL sp_lissol()')->getResultArray();
    }

    public function buscarT($b, $e){
        if($b != null && $e){
            return $this->db->query("SELECT idSol, nombreAlumno, apellido1, apellido2, 
            nomBeca, estsol from solbeca JOIN alumnos ON solbeca.solalu = alumnos.curp 
            JOIN becas ON solbeca.becsol = becas.idBeca
            WHERE concat(nombreAlumno,' ',apellido1,' ',apellido2) LIKE '%".$b."%' 
            AND estsol ='".$e."' OR nombreAlumno LIKE '%".$b."%' AND estsol ='".$e."' 
            OR apellido1 LIKE '%".$b."%' AND estsol ='".$e."'
            OR apellido2 LIKE '%".$b."%' AND estsol ='".$e."' OR cpAl LIKE '%".$b."%'
            AND estsol ='".$e."'")->getResultArray();
        }else if($b != null){
            return $this->db->query("SELECT idSol, nombreAlumno, apellido1, apellido2, 
            nomBeca, estsol from solbeca JOIN alumnos ON solbeca.solalu = alumnos.curp 
            JOIN becas ON solbeca.becsol = becas.idBeca
            WHERE concat(nombreAlumno,' ',apellido1,' ',apellido2) LIKE '%".$b."%' 
            OR nombreAlumno LIKE '%".$b."%' OR apellido1 LIKE '%".$b."%' 
            OR apellido2 LIKE '%".$b."%'  OR cpAl LIKE '%".$b."%'
            ")->getResultArray();
        }else if($e != null){
            return $this->db->query("SELECT idSol, nombreAlumno, apellido1, apellido2, 
            nomBeca, estsol from solbeca JOIN alumnos ON solbeca.solalu = alumnos.curp 
            JOIN becas ON solbeca.becsol = becas.idBeca
            WHERE estsol ='".$e."'")->getResultArray();
        }
    }

    public function guardar($data){
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_addsol(?, ?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function actualizar($data){
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_updsol(?, ?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function buscarR($id){
        return $this->db->query('CALL sp_bussol(?)', $id)->getResultArray();
    }
}