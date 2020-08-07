<?php namespace App\Controllers;

use App\Models\Horario;
use CodeIgniter\Controller;

class Horarios extends Controller{
    private $horario;

    public function __construct(){
        $this->horario = new Horario();
    }

    public function index(){
        return view('admin/horario/index.php');
    }

    public function listar(){
        echo view('admin/horario/listar.php', ['horario' => $this->horario->getListar()]);
    }

    public function buscar(){
        if($this->request->isAJAX()){
            $i = $this->request->getPost('i');
            $f = $this->request->getPost('f');
            $salida = "";
            if($i || $f){
                $horario = $this->horario->buscarT($i, $f);
                if(count($horario)>0){
                    $salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
                    <thead>
                        <tr>
                            <td>Horario Inicio</td>
                            <td>Horario Termino</td>
                            <td>dia</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach($horario as $item){
                        $salida.='<tr>
                        <td>'.$item['horaInicio'].'</td>
                        <td>'.$item['horaTermino'].'</td>
                        <td>'.$item['dias'].'</td>
                        <td>
                            <button class="btn btn-danger" onclick="deleteSchedule('.$item['idHorario'].')" title="Eliminar">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-primary" onclick="showformSchedule('.$item['idHorario'].')" title="Actualizar">
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
                echo view('admin/horario/guardarHorario.php', ['registro'=>$this->horario->buscarR($id)]);
            }else{
                echo view('admin/horario/guardarHorario.php', ['registro'=>null]);
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
            if(!$this->horario->buscarR($data2[0])){
                $msj = $this->horario->guardar($data2);
                echo $msj;
            }else{
                $msj = $this->horario->actualizar($data2);
                echo $msj;
            }
        }
    }

    public function deleteData(){
        if($this->request->isAJAX()){
            if($this->horario->delete($this->request->getPost('id')) != false){
                echo 'ok';
            }else{
                echo 'Error al borrar';
            }
        }
    }

}