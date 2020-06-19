<?php namespace App\Controllers;

use App\Models\Administrador;
use CodeIgniter\Controller;

class Login extends Controller{

    public function index(){
        $data = ['titulo' => ' Inicia Sesión', 'faicon' => 'fa-user-circle'];
        return view('Login', $data);
    }

    public function iniciarSesion(){
        if(! $this->validate([
            'nick' => 'required',
            'pass' => 'required'
        ])){
            echo '<script> window.location.href="../login"; alert("Ingrese su nickname y password por favor");</script>';
        }else{
            $usuario = new Administrador();
            $data = ['nick' => $this->request->getPost('nick'), 'pass' => $this->request->getPost('pass')];
            $r = $usuario->iniciarSesion($data);
            if($r != false){
                echo '<script> window.location.href="../login"; alert("Bienvenid@ '.$r[0]['nombreAdmin'].' '.$r[0]['apellidoP'].'"); alert("Backend en Mantenimiento. Redireccionando al Login");</script>';
            }else{
                echo '<script> window.location.href="../login"; alert("Correo o password incorrectos");</script>';
            }
        }
    }
}