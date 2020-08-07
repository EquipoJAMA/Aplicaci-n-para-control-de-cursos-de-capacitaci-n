<?php namespace App\Controllers;

use App\Models\Alumno;
use App\Models\Telefono;
use App\Models\TipoTelefono;
use CodeIgniter\Controller;

class Alumnos extends Controller{
    private $alumno;
    private $telefono;
    private $tipTel;

    public function __construct(){
        $this->alumno = new Alumno();
        $this->telefono = new Telefono();
        $this->tipTel = new TipoTelefono();
    }

    public function index(){
        return view('admin/alumnos/index.php');
    }

    public function listar(){
        echo view('admin/alumnos/listar.php', ['alumno' => $this->alumno->getListar()]);
    }

    public function buscar(){
        if($this->request->isAJAX()){
            $b = $this->request->getPost('search');
            $salida = "";
            if($b){
                $alumno = $this->alumno->buscarT($b);
                if(count($alumno)>0){
                    $salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Apellido Paterno</td>
                            <td>Apellido Materno</td>
                            <td>Código postal</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach($alumno as $item){
                        $salida.='<tr>
                        <td>'.$item['nombreAlumno'].'</td>
                        <td>'.$item['apellido1'].'</td>
                        <td>'.$item['apellido2'].'</td>
                        <td>'.$item['cpAl'].'</td>
                        <td>
                            <button class="btn btn-danger" onclick="deleteAlumno('.$item['curp'].')" title="Eliminar">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-primary" onclick="showformAlumno('.$item['curp'].')" title="Actualizar">
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
                echo view('admin/alumnos/guardarAlumno.php', ['registro'=>($idTel = $this->alumno->buscarR($id)), 
                'telt' => $this->tipTel->getListar(), 'tel' => $this->telefono->buscarR($idTel[0]['telefonoAl_idTel'])]);
            }else{
                echo view('admin/alumnos/guardarAlumno.php', ['registro'=>null, 'telt' => $this->tipTel->getListar(), 
                'tel' => null]);
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
            if($this->alumno->buscarR($data2[0])){
                $msj = $this->telefono->guardar([$data2[6], $data2[5], $data2[4]]);
                if($msj != 'ok'){
                    echo $msj;
                }else{
                    $data2 = [$data2[0], $data2[6], $data2[1], $data2[2], $data2[3], $data2[7], $data2[8]];
                    $msj = $this->alumno->actualizar($data2);
                    echo $msj;
                }
            }else{
                $msj = $this->telefono->guardar([null, $data2[5], $data2[4]]);
                if($msj != 'ok'){
                    echo $msj;
                }else{
                    $data2 = [$data2[0], null, $data2[1], $data2[2], $data2[3], $data2[7], $data2[8]];
                    $msj = $this->alumno->guardar($data2);
                    echo $msj;
                }
            }
        }
    }

    public function deleteData(){
        if($this->request->isAJAX()){
            if($id = $this->request->getPost('id')){
                if($this->alumno->delete($id) != false){
                    echo 'ok';
                }else{
                    echo 'Error al borrar';
                }
            }
        }
    }
}