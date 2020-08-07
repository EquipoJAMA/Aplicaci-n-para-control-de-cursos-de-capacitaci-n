<?php namespace App\Controllers;

use App\Models\Tipo;
use CodeIgniter\Controller;

class TipoInstructor extends Controller{
    private $tipo;

    public function __construct(){
        $this->tipo = new Tipo();
    }

    public function index(){
        return view('admin/tipo/index.php');
    }

    public function listar(){
        echo view('admin/tipo/listar.php', ['tipo' => $this->tipo->getListar()]);
    }

    public function buscar(){
        if($this->request->isAJAX()){
            $b = $this->request->getPost('search');
            $salida = "";
            if($b){
                $tipo = $this->tipo->buscarT($b);
                if(count($tipo)>0){
                    $salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
                    <thead>
                        <tr>
                            <td>Tipo</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach($tipo as $item){
                        $salida.='<tr>
                        <td>'.$item['tipo'].'</td>
                        <td>
                            <button class="btn btn-danger" onclick="deleteTypeInstructor('.$item['idTipInst'].')" title="Eliminar">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-primary" onclick="showformTypeInstructor('.$item['idTipInst'].')" title="Actualizar">
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
                echo view('admin/tipo/guardarTipo.php', [ 'registro'=>$this->tipo->buscarR($id)]);
            }else{
                echo view('admin/tipo/guardarTipo.php', ['registro'=>null]);
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
            $msj = $this->tipo->guardar($data2);
            echo $msj;
        }
    }

    public function deleteData(){
        if($this->request->isAJAX()){
            if($this->tipo->delete($this->request->getPost('id')) != false){
                echo 'ok';
            }else{
                echo 'Error al borrar';
            }
        }
    }
}