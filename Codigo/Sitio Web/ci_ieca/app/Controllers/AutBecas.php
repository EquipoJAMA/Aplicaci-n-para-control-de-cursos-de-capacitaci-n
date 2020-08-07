<?php namespace App\Controllers;

use App\Models\AutBec;
use App\Models\Pago;
use App\Models\SolBeca;
use CodeIgniter\Controller;

class AutBecas extends Controller{
    private $autBec;
    private $solBec;
    private $pago;

    public function __construct(){
        $this->autBec = new AutBec();
        $this->solBec = new SolBeca();
        $this->pago = new Pago();
    }

    public function index(){
        return view('admin/autbec/index.php');
    }

    public function listar(){
        echo view('admin/autbec/listar.php', ['autbecas' => $this->autBec->getListar()]);
    }

    public function buscar(){
        if($this->request->isAJAX()){
            $b = $this->request->getPost('search');
            $salida = "";
            if($b){
                $autBec = $this->autBec->buscarT($b);
                if(count($autBec)>0){
                    $salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
                    <thead>
                        <tr>
                            <td>Becado</td>
                            <td>Pago</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach($autBec as $item){
                        $salida.='<tr>
                        <td>'.$item['nombreAlumno']." ".$item['apellido1']." ".$item['apellido2'].'</td>
                        <td>'.$item['monpag'].'</td>
                        <td>
                            <button class="btn btn-danger" onclick="deleteAutBeca('.$item['idAut'].')" title="Eliminar">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-primary" onclick="showformAutBeca('.$item['idAut'].')" title="Actualizar">
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
                //var_dump($this->autBec->buscarR($id));
                echo view('admin/autbec/guardarAutBeca.php', ['registro'=>$this->autBec->buscarR($id), 
                'solb' => $this->solBec->getListar(), 'pagos' => $this->pago->getListar()]);
            }else{
                echo view('admin/autbec/guardarAutBeca.php', ['registro'=>null, 
                'solb' => $this->solBec->getListar(), 'pagos' => $this->pago->getListar()]);
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
            $msj = $this->autBec->guardar($data2);
            echo $msj;
        }
    }

    public function deleteData(){
        if($this->request->isAJAX()){
            if($this->autBec->delete($this->request->getPost('id')) != false){
                echo 'ok';
            }else{
                echo 'Error al borrar';
            }
        }
    }
}