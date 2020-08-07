<?php namespace App\Controllers;

use App\Models\Alumno;
use App\Models\Becas;
use App\Models\SolBeca;
use CodeIgniter\Controller;

class SolBecas extends Controller{
    private $solBeca;
    private $alumno;
    private $beca;

    public function __construct(){
        $this->solBeca = new SolBeca();
        $this->alumno = new Alumno();
        $this->beca = new Becas();
    }

    public function index(){
        return view('admin/solbeca/index.php');
    }

    public function listar(){
        echo view('admin/solbeca/listar.php', ['solbecas' => $this->solBeca->getListar()]);
    }

    public function buscar(){
        if($this->request->isAJAX()){
            $b = $this->request->getPost('search');
            $e = $this->request->getPost('e');
            $salida = "";
            if($b || $e){
                $solBeca = $this->solBeca->buscarT($b, $e);
                if(count($solBeca)>0){
                    $salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
                    <thead>
                        <tr>
                            <td>Aspirante</td>
                            <td>Beca</td>
                            <td>Estado de solicitud</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach($solBeca as $item){
                        $salida.='<tr>
                        <td>'.$item['nombreAlumno']." ".$item['apellido1']." ".$item['apellido2'].'</td>
                        <td>'.$item['nomBeca'].'</td>
                        <td>'.$item['estsol'].'</td>
                        <td>
                            <button class="btn btn-danger" onclick="deleteSolBeca('.$item['idSol'].')" title="Eliminar">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-primary" onclick="showformSolBeca('.$item['idSol'].')" title="Actualizar">
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
                echo view('admin/solbeca/guardarSolBeca.php', ['registro'=>$this->solBeca->buscarR($id), 
                'alumnos' => $this->alumno->getListar(), 'becas' => $this->beca->getListar()]);
            }else{
                echo view('admin/solbeca/guardarSolBeca.php', ['registro'=>null, 
                'alumnos' => $this->alumno->getListar(), 'becas' => $this->beca->getListar()]);
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
            if(!$this->solBeca->buscarR($data2[0])){
                $msj = $this->solBeca->guardar($data2);
                echo $msj;
            }else{
                $msj = $this->solBeca->actualizar($data2);
                echo $msj;
            }
        }
    }

    public function deleteData(){
        if($this->request->isAJAX()){
            if($this->solBeca->delete($this->request->getPost('id')) != false){
                echo 'ok';
            }else{
                echo 'Error al borrar';
            }
        }
    }
}