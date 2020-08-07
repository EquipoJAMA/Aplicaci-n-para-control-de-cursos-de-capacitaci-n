<?php namespace App\Models;

use CodeIgniter\Model;

class Horario extends Model{
    protected $table = 'horario';
    protected $primaryKey = 'idHorario';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $allowFields = ['idHorario', 'horaInicio', 'horaTermino', 'dias'];

    public function getListar(){
        return $this->db->query('CALL sp_enlhor()')->getResultArray();
    }

    public function buscarT($i, $f){
        if($i != null && $f != null){
            return $this->db->query("SELECT idHorario, horaInicio, horaTermino, dias FROM horario WHERE horaInicio >='".$i."'
            AND horaTermino <='".$f."'")->getResultArray();
        }else if($i != null){
            return $this->db->query("SELECT idHorario, horaInicio, horaTermino, dias FROM horario WHERE horaInicio >='".$i."'")->getResultArray();
        }else if($f != null){
            return $this->db->query("SELECT idHorario, horaInicio, horaTermino, dias FROM horario WHERE horaTermino <='".$f."'")->getResultArray();
        }
    }

    public function guardar($data){
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_addhor(?, ?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function actualizar($data){
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_updhor(?, ?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function buscarR($id){
        return $this->db->query('CALL sp_bushor(?)', $id)->getResultArray();
    }
}