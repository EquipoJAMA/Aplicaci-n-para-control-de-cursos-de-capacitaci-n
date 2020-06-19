<?php namespace App\Controllers;

use App\Models\Curso;

class Home extends BaseController{


	public function index(){
		$curso = new Curso();
		$data = ['titulo' => ' ¿Que hay de nuevo?', 'faicon' => 'fa-home', 'cursos' => $curso->getListar()];
		return view('index', $data);
	}

	//--------------------------------------------------------------------

}
