<?php namespace App\Controllers;

use App\Models\Especialidad;
use CodeIgniter\Controller;

class EspecialidadInstructor extends Controller{
    private $especialidad;

    public function __construct(){
        $this->especialidad = new Especialidad();
    }

    public function index(){
        return view('admin/especialidad/index.php');
    }

    public function listar(){
        echo view('admin/especialidad/listar.php', ['especialidad' => $this->especialidad->getListar()]);
    }

    public function buscar(){
        if($this->request->isAJAX()){
            $b = $this->request->getPost('search');
            $salida = "";
            if($b){
                $especialidad = $this->especialidad->buscarT($b);
                if(count($especialidad)>0){
                    $salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
                    <thead>
                        <tr>
                            <td>Especialidad</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach($especialidad as $item){
                        $salida.='<tr>
                        <td>'.$item['especialidad'].'</td>
                        <td>
                            <button class="btn btn-danger" onclick="deleteSpecialtyInstructor('.$item['idEspInst'].')" title="Eliminar">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-primary" onclick="showformSpecialtyInstructor('.$item['idEspInst'].')" title="Actualizar">
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
                echo view('admin/especialidad/guardarEspecialidad.php', ['registro'=>$this->especialidad->buscarR($id)]);
            }else{
                echo view('admin/especialidad/guardarEspecialidad.php', ['registro'=>null]);
            }
        }
    }

    public function saveData(){
        if($this->request->isAJAX()){
            $data = $this->request->getPost('datos');
            $data2 = [];
            $e = 0;
            foreach($data as $i => $v){
                if($v['value'] == ""){    
                    $data2[$e] = null;
                    $e++;
                }else{
                    $data2[$e] = $v['value'];
                    $e++;
                }
            }
            $msj = $this->especialidad->guardar($data2);
            echo $msj;
        }
    }

    public function deleteData(){
        if($this->request->isAJAX()){
            if($this->especialidad->delete($this->request->getPost('id')) != false){
                echo 'ok';
            }else{
                echo 'Error al borrar';
            }
        }
    }

}