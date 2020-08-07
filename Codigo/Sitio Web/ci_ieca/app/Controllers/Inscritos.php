<?php namespace App\Controllers;

use App\Models\Alumno;
use App\Models\Grupo;
use App\Models\Inscrito;
use App\Models\Pago;
use CodeIgniter\Controller;

class Inscritos extends Controller{
    private $inscrito;
    private $grupo;
    private $alumno;
    private $pago;

    public function __construct(){
        $this->inscrito = new Inscrito();
        $this->grupo = new Grupo();
        $this->alumno = new Alumno();
        $this->pago = new Pago();
    }

    public function index(){
        return view('admin/inscritos/index.php');
    }

    public function listar(){
        echo view('admin/inscritos/listar.php', ['inscritos' => $this->inscrito->getListar()]);
    }

    public function buscar(){
        if($this->request->isAJAX()){
            $b = $this->request->getPost('search');
            $e = $this->request->getPost('e');
            $salida = "";
            if($b || $e){
                $inscrito = $this->inscrito->buscarT($b,$e);
                if(count($inscrito)>0){
                    $salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
                    <thead>
                        <tr>
                            <td>Grupo</td>
                            <td>Alumno</td>
                            <td>Pago</td>
                            <td>Estatus</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach($inscrito as $item){
                        $salida.='<tr>
                        <td>'.$item['nombre_curso'].'</td>
                        <td>'.$item['nombreAlumno']." ".$item['apellido1']." ".$item['apellido2'].'</td>
                        <td>'.$item['pago'].'</td>
                        <td>'.$item['estatusP'].'</td>
                        <td>
                            <button class="btn btn-danger" onclick="deleteInscrito('.$item['idInscrito'].')" title="Eliminar">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-primary" onclick="showformInscrito('.$item['idInscrito'].')" title="Actualizar">
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
                echo view('admin/inscritos/guardarInscrito.php', ['registro'=>$this->inscrito->buscarR($id), 
                'grupo' => $this->grupo->getListar(), 'alumnos' => $this->alumno->getListar(), 
                'pagos' => $this->pago->getListar()]);
            }else{
                echo view('admin/inscritos/guardarInscrito.php', ['registro'=>null, 
                'grupo' => $this->grupo->getListar(), 'alumnos' => $this->alumno->getListar(), 
                'pagos' => $this->pago->getListar()]);
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
            $msj = $this->inscrito->guardar($data2);
            echo $msj;
        }
    }

    public function deleteData(){
        if($this->request->isAJAX()){
            if($this->inscrito->delete($this->request->getPost('id')) != false){
                echo 'ok';
            }else{
                echo 'Error al borrar';
            }
        }
    }
}