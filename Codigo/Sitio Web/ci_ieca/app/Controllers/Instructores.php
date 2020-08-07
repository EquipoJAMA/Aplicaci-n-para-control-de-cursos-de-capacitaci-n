<?php namespace App\Controllers;

use App\Models\Especialidad;
use App\Models\Instructor;
use App\Models\Telefono;
use App\Models\Tipo;
use App\Models\TipoTelefono;
use CodeIgniter\Controller;

class Instructores extends Controller{
    private $instructor;
    private $especialidad;
    private $tipo;
    private $telefono;
    private $tipTel;

    public function __construct(){
        $this->instructor = new Instructor();
        $this->especialidad = new Especialidad();
        $this->tipo = new Tipo();
        $this->telefono = new Telefono();
        $this->tipTel = new TipoTelefono();
    }

    public function index(){
        return view('admin/instructor/index.php',['especialidad' => $this->especialidad->getListar(), 'tipo' => $this->tipo->getListar()]);
    }

    public function listar(){
        echo view('admin/instructor/listar.php', ['instructor' => $this->instructor->getListar()]);
    }

    public function buscar(){
        if($this->request->isAJAX()){
            $b = $this->request->getPost('search');
            $e = $this->request->getPost('esp');
            $t = $this->request->getPost('tip');
            $salida = "";
            if($b || $e || $t){
                $instructor = $this->instructor->buscarT($b, $e, $t);
                if(count($instructor)>0){
                    $salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Especialidad</td>
                            <td>Tipo</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach($instructor as $item){
                        $salida.='<tr>
                        <td>'.$item['nombreInstructor']." ".$item['apellidoI1']." ".$item['apellidoI2'].'</td>
                        <td>'.$item['especialidad'].'</td>
                        <td>'.$item['tipo'].'</td>
                        <td>
                            <button class="btn btn-danger" onclick="deleteInstructor('.$item['idInstructor'].')" title="Eliminar">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-primary" onclick="showformInstructor('.$item['idInstructor'].')" title="Actualizar">
                                <i class="fa fa-pencil"></i>
                            </button>
                        </td
                        </tr>';
                    }
                    $salida.='</tbody></table>';
                }else{
                    $salida = '<div class="col-xs-12"><p class="centered" style="font-size: 17px; border-left: 10px solid red; border-right: 10px solid red;">No hay datos</p></div>';
                }
                echo $salida;
            }
        }
    }

    public function showForm(){
        if($this->request->isAJAX()){
            $id[0] = $this->request->getPost('id');
            if($id[0]){
                echo view('admin/Instructor/guardarInstructor.php', ['registro'=>($idTel = $this->instructor->buscarR($id)), 
                'telt' => $this->tipTel->getListar(), 'tel' => $this->telefono->buscarR($idTel[0]['telefonoIns_idTel']),
                'e' => $this->especialidad->getListar(), 't' => $this->tipo->getListar()]);
            }else{
                echo view('admin/Instructor/guardarInstructor.php', ['registro'=>null, 'telt' => $this->tipTel->getListar(), 
                'tel' => null, 'e' => $this->especialidad->getListar(), 't' => $this->tipo->getListar()]);
            }
        }
    }

    public function saveData(){
        if($this->request->isAJAX()){
            $data = $this->request->getPost('datos');
            $data2 = [];
            $e = 0;
            foreach($data as $i => $v){
                $data2[$e] = $v['value'];
                $e++;
            }
            if($this->instructor->buscarR($data2[0])){
                $msj = $this->telefono->guardar([$data2[6], $data2[5], $data2[4]]);
                if($msj != 'ok'){
                    echo $msj;
                }else{
                    $data2 = [$data2[0], $data2[7], $data2[8], $data2[6], $data2[1], $data2[2], $data2[3]];
                    $msj = $this->instructor->actualizar($data2);
                    echo $msj;
                }
            }else{
                $msj = $this->telefono->guardar([null, $data2[5], $data2[4]]);
                if($msj != 'ok'){
                    echo $msj;
                }else{
                    $data2 = [$data2[0], $data2[7], $data2[8], null, $data2[1], $data2[2], $data2[3]];
                    $msj = $this->instructor->guardar($data2);
                    echo $msj;
                }
            }
        }
    }

    public function deleteData(){
        if($this->request->isAJAX()){
            if($this->instructor->delete($this->request->getPost('id')) != false){
                echo 'ok';
            }else{
                echo 'Error al borrar';
            }
        }
    }

}