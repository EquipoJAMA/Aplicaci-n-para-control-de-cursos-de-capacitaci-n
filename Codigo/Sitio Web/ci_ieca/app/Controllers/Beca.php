<?php namespace App\Controllers;

use App\Models\Becas;
use CodeIgniter\Controller;

class Beca extends Controller{
    private $beca;

    public function __construct(){
        $this->beca = new Becas();
    }

    public function index(){
        return view('admin/becas/index.php');
    }

    public function listar(){
        echo view('admin/becas/listar.php', ['becas' => $this->beca->getListar()]);
    }

    public function buscar(){
        if($this->request->isAJAX()){
            $b = $this->request->getPost('search');
            $salida = "";
            if($b){
                $beca = $this->beca->buscarT($b);
                if(count($beca)>0){
                    $salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
                    <thead>
                        <tr>
                            <td>Beca</td>
                            <td>Ayuda de</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach($beca as $item){
                        $salida.='<tr>
                        <td>'.$item['nomBeca'].'</td>
                        <td>$'.$item['mondes'].'</td>
                        <td>
                            <button class="btn btn-danger" onclick="deleteBeca('.$item['idBeca'].')" title="Eliminar">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-primary" onclick="showformBeca('.$item['idBeca'].')" title="Actualizar">
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
                echo view('admin/becas/guardarBeca.php', ['registro'=>$this->beca->buscarR($id)]);
            }else{
                echo view('admin/becas/guardarBeca.php', ['registro'=>null]);
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
            if(!$this->beca->buscarR($data2[0])){
                $msj = $this->beca->guardar($data2);
                echo $msj;
            }else{
                $msj = $this->beca->actualizar($data2);
                echo $msj;
            }
        }
    }

    public function deleteData(){
        if($this->request->isAJAX()){
            if($this->beca->delete($this->request->getPost('id')) != false){
                echo 'ok';
            }else{
                echo 'Error al borrar';
            }
        }
    }
}