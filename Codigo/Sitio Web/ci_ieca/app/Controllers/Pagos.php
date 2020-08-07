<?php namespace App\Controllers;

use App\Models\Curso;
use App\Models\Pago;
use CodeIgniter\Controller;

class Pagos extends Controller{
    private $pago;
    private $curso;

    public function __construct(){
        $this->pago = new Pago();
        $this->curso = new Curso();
    }

    public function index(){
        return view('admin/pagos/index.php');
    }

    public function listar(){
        echo view('admin/pagos/listar.php', ['pagos' => $this->pago->getListar()]);
    }

    public function buscar(){
        if($this->request->isAJAX()){
            $b = $this->request->getPost('search');
            $p = $this->request->getPost('p');
            $e = $this->request->getPost('e');
            $salida = "";
            if($b || $p || $e){
                $pago = $this->pago->buscarT($b, $p, $e);
                if(count($pago)>0){
                    $salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
                    <thead>
                        <tr>
                            <td>Curso</td>
                            <td>Nombre</td>
                            <td>Fecha de pago</td>
                            <td>Estatus del pago</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach($pago as $item){
                        $salida.='<tr>
                        <td><img height="100" width="200" src="'.base_url('vendor/template/'.$item['imgcurso']).'"></td>
                        <td>'.$item['nombre_curso'].'</td>
                        <td>'.$item['fechaP'].'</td>
                        <td>'.$item['estatusP'].'</td>
                        <td>
                            <button class="btn btn-danger" onclick="deletePago('.$item['idPago'].')" title="Eliminar">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-primary" onclick="showformPago('.$item['idPago'].')" title="Actualizar">
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
                echo view('admin/pagos/guardarPago.php', ['registro'=>$this->pago->buscarR($id), 'cursos' => $this->curso->getListar()]);
            }else{
                echo view('admin/pagos/guardarPago.php', ['registro'=>null, 'cursos' => $this->curso->getListar()]);
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
            $msj = $this->pago->guardar($data2);
            echo $msj;
        }
    }

    public function deleteData(){
        if($this->request->isAJAX()){
            if($this->pago->delete($this->request->getPost('id')) != false){
                echo 'ok';
            }else{
                echo 'Error al borrar';
            }
        }
    }
}