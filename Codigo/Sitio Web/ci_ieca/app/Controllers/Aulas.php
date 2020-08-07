<?php namespace App\Controllers;

use App\Models\Aula;
use CodeIgniter\Controller;

class Aulas extends Controller{
    protected $aula;

    public function __construct(){
        $this->aula = new Aula();
    }

    public function index(){
        return view('admin/aulas/index.php');
    }

    public function listar(){
        echo view('admin/aulas/listar.php', ['aulas' => $this->aula->getListar()]);
    }

    public function buscar(){
        if($this->request->isAJAX()){
            $b = $this->request->getPost('search');
            $e = $this->request->getPost('e');
            $salida = "";
            if($b || $e){
                $aula = $this->aula->buscarT($b, $e);
                if(count($aula)>0){
                    $salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
                    <thead>
                        <tr>
                            <td>Nombre Aula</td>
                            <td>Estatus</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach($aula as $item){
                        $salida.='<tr>
                        <td>'.$item['nombreAula'].'</td>
                        <td>'.$item['estatusAula'].'</td>
                        <td>
                            <button class="btn btn-danger" onclick="deleteAula('.$item['idAula'].')" title="Eliminar">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-primary" onclick="showformAula('.$item['idAula'].')" title="Actualizar">
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
                echo view('admin/aulas/guardarAula.php', ['registro'=>$this->aula->buscarR($id)]);
            }else{
                echo view('admin/aulas/guardarAula.php', ['registro'=>null]);
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
            $msj = $this->aula->guardar($data2);
            echo $msj;
        }
    }

    public function deleteData(){
        if($this->request->isAJAX()){
            if($this->aula->delete($this->request->getPost('id')) != false){
                echo 'ok';
            }else{
                echo 'Error al borrar';
            }
        }
    }
}