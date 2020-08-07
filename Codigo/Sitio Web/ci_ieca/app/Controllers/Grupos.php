<?php namespace App\Controllers;

use App\Models\Aula;
use App\Models\Curso;
use App\Models\Grupo;
use App\Models\Horario;
use CodeIgniter\Controller;

class Grupos extends Controller{
    private $grupo;
    private $curso;
    private $aula;
    private $horario;

    public function __construct(){
        $this->grupo = new Grupo();
        $this->curso = new Curso();
        $this->aula = new Aula();
        $this->horario = new Horario();
    }

    public function index(){
        return view('admin/grupo/index.php');
    }

    public function listar(){
        echo view('admin/grupo/listar.php', ['grupo' => $this->grupo->getListar()]);
    }

    public function buscar(){
        if($this->request->isAJAX()){
            $b = $this->request->getPost('search');
            $i = $this->request->getPost('i');
            $f = $this->request->getPost('f');
            $e = $this->request->getPost('e');
            $salida = "";
            if($b || $i || $f || $e){
                $grupo = $this->grupo->buscarT($b,$i,$f,$e);
                if(count($grupo)>0){
                    $salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
                    <thead>
                        <tr>
                            <td>Grupo</td>
                            <td>Curso</td>
                            <td>Fecha Inicio</td>
                            <td>Fecha Termino</td>
                            <td>Estatus</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach($grupo as $item){
                        $salida.='<tr>
                        <td>'.$item['idGrupo'].'</td>
                        <td>'.$item['nombre_curso'].'</td>
                        <td>'.$item['fechaInicio'].'</td>
                        <td>'.$item['fechaTermino'].'</td>
                        <td>'.$item['estatusGr'].'</td>
                        <td>
                            <button class="btn btn-danger" onclick="deleteGrupo('.$item['idGrupo'].')" title="Eliminar">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-primary" onclick="showformGrupo('.$item['idGrupo'].')" title="Actualizar">
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
                echo view('admin/grupo/guardarGrupo.php', ['registro'=>$this->grupo->buscarR($id), 
                'cursos' => $this->curso->getListar(), 'aulas' => $this->aula->getListar(), 
                'horarios' => $this->horario->getListar()]);
            }else{
                echo view('admin/grupo/guardarGrupo.php', ['registro'=>null, 
                'cursos' => $this->curso->getListar(), 'aulas' => $this->aula->getListar(), 
                'horarios' => $this->horario->getListar()]);
            }
        }
    }

    public function saveData(){
        if($this->request->isAJAX()){
            $data = $this->request->getPost('datos');
            $data2 = [];
            $e = 0;
            foreach($data as $i => $v){
                if($e == 4){
                    $data2[$e] = null;
                    $e++;                
                }
                $data2[$e] = $v['value'];
                $e++;
            }
            if(!($r=$this->grupo->buscarR($data2[0]))){
                $msj = $this->grupo->guardar($data2);
                echo $msj;
            }else{
                $data2[4]=$r[0]['estatusGr'];
                $msj = $this->grupo->actualizar($data2);
                echo $msj;
            }
        }
    }

    public function deleteData(){
        if($this->request->isAJAX()){
            if($this->grupo->delete($this->request->getPost('id')) != false){
                echo 'ok';
            }else{
                echo 'Error al borrar';
            }
        }
    }
}