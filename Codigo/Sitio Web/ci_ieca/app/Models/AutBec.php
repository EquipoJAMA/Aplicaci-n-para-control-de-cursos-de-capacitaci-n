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

    public function buscarT($b){
        if($b != null){
            return $this->db->query("SELECT idAut, nombreAlumno, apellido1, apellido2, cpAl, monpag 
            FROM autbec JOIN solbeca ON autbec.autsol = solbeca.idSol 
            JOIN alumnos ON solbeca.solalu = alumnos.curp 
            WHERE concat(nombreAlumno,' ',apellido1,' ',apellido2) LIKE '%".$b."%' 
            OR nombreAlumno LIKE '%".$b."%' OR apellido1 LIKE '%".$b."%'
            OR apellido2 LIKE '%".$b."%' OR cpAl LIKE '%".$b."%'")->getResultArray();
        }
    }

    public function guardar($data){
        if($data[0] != null){
            //var_dump($data);
            $msj = $this->db->query('CALL sp_updaut(?, ?, ?, ?)', $data)->getResultArray();
        }else{
            $msj = $this->db->query('CALL sp_addaut(?, ?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }


    public function buscarR($id){
        return $this->db->query('CALL sp_busaut(?)', $id)->getResultArray();
    }
}