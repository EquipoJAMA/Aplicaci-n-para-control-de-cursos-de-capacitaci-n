<?php namespace App\Models;

use CodeIgniter\Model;

class Instructor extends Model{
    protected $table = 'instructor';
    protected $primaryKey = 'idInstructor';

    protected $returnType = 'array';
    protected $useSoftdeletes = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $allowFields = ['idInstructor', 'especialidadIns_idEspInst', 
    'tipoInts_idTipIns', 'telefonoIns_idTel', 'nombreInstructor', 'apellidoI1', 'apellidoI2'];

    public function getListar(){
        return $this->db->query('CALL sp_enlinst()')->getResultArray();
    }

    public function buscarT($b, $e, $t){
        if($b != null && $e != null && $t != null){
            return $this->db->query("SELECT idInstructor, nombreInstructor, apellidoI1, 
            apellidoI2, especialidad, tipo FROM instructor JOIN especialidad ON 
            instructor.especialidadIns_idEspInst = especialidad.idEspInst JOIN tipo ON 
            instructor.tipoIns_idTipInst = tipo.idTipInst WHERE concat(nombreInstructor,' ',apellidoI1,' ',apellidoI2) 
            LIKE '%".$b."%' AND especialidad LIKE '".$e."' AND tipo LIKE '".$t."' OR nombreInstructor LIKE '%".$b."%'
            AND especialidad LIKE '".$e."' AND tipo LIKE '".$t."' OR apellidoI1 LIKE '%".$b."%'
            AND especialidad LIKE '".$e."' AND tipo LIKE '".$t."' OR apellidoI2 LIKE '%".$b."%' 
            AND especialidad LIKE '".$e."' AND tipo LIKE '".$t."' OR nombreInstructor LIKE '%".$b."%'
            AND especialidad LIKE '".$e."'")->getResultArray();
        }else if($b != null && $e != null){
            return $this->db->query("SELECT idInstructor, nombreInstructor, apellidoI1, 
            apellidoI2, especialidad, tipo FROM instructor JOIN especialidad ON 
            instructor.especialidadIns_idEspInst = especialidad.idEspInst JOIN tipo ON 
            instructor.tipoIns_idTipInst = tipo.idTipInst WHERE concat(nombreInstructor,' ',apellidoI1,' ',apellidoI2) 
            LIKE '%".$b."%' AND especialidad LIKE '".$e."' OR nombreInstructor LIKE '%".$b."%'
            AND especialidad LIKE '".$e."' OR apellidoI1 LIKE '%".$b."%' AND especialidad LIKE '".$e."' 
            OR apellidoI2 LIKE '%".$b."%' AND especialidad LIKE '".$e."'")->getResultArray();
        }else if($b != null && $t != null){
            return $this->db->query("SELECT idInstructor, nombreInstructor, apellidoI1, 
            apellidoI2, especialidad, tipo FROM instructor JOIN especialidad ON 
            instructor.especialidadIns_idEspInst = especialidad.idEspInst JOIN tipo ON 
            instructor.tipoIns_idTipInst = tipo.idTipInst WHERE concat(nombreInstructor,' ',apellidoI1,' ',apellidoI2) 
            LIKE '%".$b."%' AND tipo LIKE '".$t."' OR nombreInstructor LIKE '%".$b."%' 
            AND tipo LIKE '".$t."' OR apellidoI1 LIKE '%".$b."%' AND tipo LIKE '".$t."'
            OR apellidoI2 LIKE '%".$b."%' AND tipo LIKE '".$t."'")->getResultArray();
        }else if($e != null && $t != null){
            return $this->db->query("SELECT idInstructor, nombreInstructor, apellidoI1, 
            apellidoI2, especialidad, tipo FROM instructor JOIN especialidad ON 
            instructor.especialidadIns_idEspInst = especialidad.idEspInst JOIN tipo ON 
            instructor.tipoIns_idTipInst = tipo.idTipInst WHERE especialidad LIKE '".$e."' 
            AND tipo LIKE '".$t."'")->getResultArray();
        }else if($b != null){
            return $this->db->query("SELECT idInstructor, nombreInstructor, apellidoI1, 
            apellidoI2, especialidad, tipo FROM instructor JOIN especialidad ON 
            instructor.especialidadIns_idEspInst = especialidad.idEspInst JOIN tipo ON 
            instructor.tipoIns_idTipInst = tipo.idTipInst WHERE concat(nombreInstructor,' ',apellidoI1,' ',apellidoI2) 
            LIKE '%".$b."%' OR nombreInstructor LIKE '%".$b."%'
            OR apellidoI1 LIKE '%".$b."%' OR apellidoI2 LIKE '%".$b."%'")->getResultArray();
        }else if($e != null){
            return $this->db->query("SELECT idInstructor, nombreInstructor, apellidoI1, 
            apellidoI2, especialidad, tipo FROM instructor JOIN especialidad ON 
            instructor.especialidadIns_idEspInst = especialidad.idEspInst JOIN tipo ON 
            instructor.tipoIns_idTipInst = tipo.idTipInst WHERE especialidad LIKE '".$e."'")->getResultArray();
        }else if($t != null){
            return $this->db->query("SELECT idInstructor, nombreInstructor, apellidoI1, 
            apellidoI2, especialidad, tipo FROM instructor JOIN especialidad ON 
            instructor.especialidadIns_idEspInst = especialidad.idEspInst JOIN tipo ON 
            instructor.tipoIns_idTipInst = tipo.idTipInst WHERE tipo LIKE '".$t."'")->getResultArray();
        }
    }

    public function guardar($data){
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_addins(?, ?, ?, ?, ?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function actualizar($data){
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_updins(?, ?, ?, ?, ?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function buscarR($id){
        return $this->db->query('CALL sp_busins(?)', $id)->getResultArray();
    }
}