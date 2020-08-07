<?php namespace App\Models;

use CodeIgniter\Model;

class Alumno extends Model{
    protected $table = 'alumnos';
    protected $primaryKey = 'curp';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $allowFields = ['curp', 'telefonoAl_idTel', 'nombreAlumno', 'apellido1', 'apellido2', 'correoAl', 'cpAl'];

    public function getListar(){
        return $this->db->query('CALL sp_enlal()')->getResultArray();
    }

    public function buscarT($b){
        if($b != null){
            return $this->db->query("SELECT curp, nombreAlumno, apellido1, apellido2, cpAl FROM alumnos 
            WHERE concat(nombreAlumno,' ',apellido1,' ',apellido2) LIKE '%".$b."%' 
            OR nombreAlumno LIKE '%".$b."%' OR apellido1 LIKE '%".$b."%'
            OR apellido2 LIKE '%".$b."%' OR cpAl LIKE '%".$b."%' OR curp LIKE '%".$b."%'")->getResultArray();
        }
    }

    public function guardar($data){
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_addalu(?, ?, ?, ?, ?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function actualizar($data){
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_updalu(?, ?, ?, ?, ?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function buscarR($id){
        return $this->db->query('CALL sp_busalu(?)', $id)->getResultArray();
    }
}