<?php namespace App\Controllers;

use CodeIgniter\Controller;

class  Conocenos extends Controller{

    public function index(){
        $data['titulo'] ='Conoce quienes somos';
        $data['faicon'] = 'fa-child mr-3';
        return view('Conocenos', $data);
    }
}