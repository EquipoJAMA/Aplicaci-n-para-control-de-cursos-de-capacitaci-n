<?php namespace App\Controllers;

use App\Models\Curso;
use CodeIgniter\Controller;

class Cursos extends Controller{
    private $cursos;

    public function __construct(){
        $this->cursos = new Curso();
    }

    public function index(){
        $data = ['cursos' => $this->cursos->getListar(), 'titulo' => ' Cursos disponibles', 'faicon' => 'fa-folder'];
        return view('cursos', $data);   
    }

    public function indexC(){
        return view('admin/cursos/index.php');
    }
}