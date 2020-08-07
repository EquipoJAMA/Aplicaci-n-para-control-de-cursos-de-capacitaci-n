<?php namespace App\Controllers;

use App\Models\Curso;
use App\Models\Instructor;
use CodeIgniter\Controller;

class Cursoss extends Controller{
    private $cursos;
    private $instructor;

    public function __construct(){
        $this->cursos = new Curso();
        $this->instructor = new Instructor();
    }

    public function index(){
        return view('admin/cursos/index.php');
    }

    public function listar(){
        echo view('admin/cursos/listar.php', ['curso' => $this->cursos->getListar()]);
    }

    public function showForm(){
        if($this->request->isAJAX()){
            $id[0] = $this->request->getPost('id');
            if($id[0]){
                echo view('admin/cursos/guardarCurso.php', ['registro'=> $this->cursos->buscarR($id), 'instructores' => $this->instructor->getListar()]);
            }else{
                echo view('admin/cursos/guardarCurso.php', ['registro'=>null, 'instructores' => $this->instructor->getListar()]);
            }
        }
    }

    public function buscar(){
        if($this->request->isAJAX()){
            $b = $this->request->getPost('search');
            $i = $this->request->getPost('i');
            $f = $this->request->getPost('f');
            $salida = "";
            if($b || $i || $f){
                $cursos = $this->cursos->buscarT($b, $i, $f);
                if(count($cursos)>0){
                    $salida.='<table class="table table-bordered table-striped table-condesed" id="hidden-table-info">
                    <thead>
                        <tr>
                            <td>Nombre Curso</td>
                            <td>Fecha Inicio</td>
                            <td>Fecha Termino</td>
                            <td>Costo</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach($cursos as $item){
                        $salida.='<tr>
                        <td>'.$item['nombre_curso'].'</td>
                        <td>'.$item['fechaInicio'].'</td>
                        <td>'.$item['fechaTermino'].'</td>
                        <td>'.$item['costo'].'</td>
                        <td>
                            <button class="btn btn-danger" onclick="deleteCurso('.$item['idCursos'].')" title="Eliminar">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-primary" onclick="showformCurso('.$item['idCursos'].')" title="Actualizar">
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

    public function saveData(){
        if($this->request->isAJAX()){
            $img = $this->request->getFile('url');
            $rutaDestino = "";
            if($img->getClientExtension() == 'jpeg' || $img->getClientExtension() == 'png' 
                || $img->getClientExtension() == 'jpg'){
                    $ruta = ROOTPATH.'vendor/template/uploads';
                    $img->move($ruta, 
                    $rutaDestino = (explode('.',$img->getName())[0].date('dmyhis')).".".$img
                    ->getClientExtension());
            }
            $id = $this->request->getPost('id') ?: null;
            if($id){
                if(($c = $this->cursos->buscarR($id))){
                    if(!$rutaDestino){
                        $rutaDestino = $c[0]['imgCurso'];
                    }else{
                        unlink((str_replace("uploads","",$ruta)).$c[0]['imgCurso']);
                        $rutaDestino = 'uploads/'.$rutaDestino;
                    }
                        $data = [0 => $id, 1 => $this->request->getPost('ins_idInstructor'), 
                        2 => $this->request->getPost('nombre_curso'), 3 => $rutaDestino, 
                        4 => $this->request->getPost('fechaInicio'), 
                        5 => $this->request->getPost('fechaTermino'), 
                        6 => $this->request->getPost('descripcion'), 7 => $this->request->getPost('costo')];
                        echo $this->cursos->actualizar($data);
                }else{
                    $data = [0 => $id, 1 => $this->request->getPost('ins_idInstructor'), 
                    2 => $this->request->getPost('nombre_curso'), 3 => $rutaDestino, 
                    4 => $this->request->getPost('fechaInicio'), 
                    5 => $this->request->getPost('fechaTermino'), 
                    6 => $this->request->getPost('descripcion'), 7 => $this->request->getPost('costo')];
                    echo $this->cursos->guardar($data);
                }
            }else{
                echo "Falta el id";
            }
        }
    }

    public function deleteData(){
        if($this->request->isAJAX()){
            if($id = $this->request->getPost('id')){
                unlink(ROOTPATH.'vendor/template/'.$this->cursos->buscarR($this->request->getPost('id'))[0]['imgCurso']);
                if($this->cursos->delete($id) != false){
                    echo 'ok';
                }else{
                    echo 'Error al borrar';
                }
            }
        }
    }


}