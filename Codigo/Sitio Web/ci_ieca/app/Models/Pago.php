<?php namespace App\Models;

use CodeIgniter\Model;

class Pago extends Model{
    protected $table = 'pagos';
    protected $primaryKey = 'idPago';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $allowFields = ['idPago', 'idCur', 'pago', 'fechaP', 'estatusP'];

    public function getListar(){
        return $this->db->query('CALL sp_enlpag()')->getResultArray();
    }

    public function buscarT($b, $p, $e){
        if($b != null && $p != null && $e != null){
            return $this->db->query("SELECT idPago, nombre_curso, imgcurso, pago, fechaP, estatusP 
            FROM pagos JOIN cursos ON pagos.id_cur = cursos.idCursos WHERE nombre_curso LIKE '%".$b."%'
            AND fechaP >='".$p."' AND estatusP ='".$e."'")->getResultArray();
        }else if($b != null && $p != null){
            return $this->db->query("SELECT idPago, nombre_curso, imgcurso, pago, fechaP, estatusP 
            FROM pagos JOIN cursos ON pagos.id_cur = cursos.idCursos WHERE nombre_curso LIKE '%".$b."%'
            AND fechaP >='".$p."'")->getResultArray();
        }else if($b != null){
            return $this->db->query("SELECT idPago, nombre_curso, imgcurso, pago, fechaP, estatusP 
            FROM pagos JOIN cursos ON pagos.id_cur = cursos.idCursos WHERE nombre_curso 
            LIKE '%".$b."%'")->getResultArray();
        }else if($p != null){
            return $this->db->query("SELECT idPago, nombre_curso, imgcurso, pago, fechaP, estatusP 
            FROM pagos JOIN cursos ON pagos.id_cur = cursos.idCursos WHERE fechaP >='".$p."'")->getResultArray();
        }else if($e != null){
            return $this->db->query("SELECT idPago, nombre_curso, imgcurso, pago, fechaP, estatusP 
            FROM pagos JOIN cursos ON pagos.id_cur = cursos.idCursos WHERE estatusP ='".$e."'")->getResultArray();
        }
    }

    public function guardar($data){
        if($data[0] != null){
            $msj = $this->db->query('CALL sp_updpago(?, ?, ?, ?, ?)', $data)->getResultArray();
        }else{
            $msj = $this->db->query('CALL sp_addpago(?, ?, ?, ?, ?)', $data)->getResultArray();
        }
        if($msj != null){
            return $msj[0]['mensaje'];
        }else{
            return $msj = 'ok';
        }
    }

    public function buscarR($id){
        return $this->db->query('CALL sp_buspago(?)', $id)->getResultArray();
    }
}