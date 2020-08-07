<?php namespace App\Controllers;

use App\Models\Administrador;
use CodeIgniter\Controller;

class Login extends Controller{

    public function index(){
        $data = ['titulo' => ' Inicia Sesión', 'faicon' => 'fa-user-circle'];
        return view('Login', $data);;
    }

    public function iniciarSesion(){
        if(! $this->validate([
            'nick' => 'required',
            'pass' => 'required'
        ])){
            echo '<script> alert("Ingrese su nickname y password por favor"); window.location.href="../login"; </script>';
        }else{
            $usuario = new Administrador();
            $data = ['nick' => $this->request->getPost('nick'), 'pass' => $this->request->getPost('pass')];
            $r = $usuario->iniciarSesion($data);
            if($r != false){
                $session = session();
                $session->set(['idAdmin' => $r[0]['idAdmin'], 'nombreAdmin' => $r[0]['nombreAdmin'], 
                'apellidoP' => $r[0]['apellidoP'], 'apellidoM' => $r[0]['apellidoM'], 
                'nick' => $r[0]['nick'], 'privilegios' => $r[0]['privilegios']]);
                echo '<script> alert("Bienvenid@ '.$r[0]['nombreAdmin'].' '.$r[0]['apellidoP'].'"); window.location.href="../HomeAdmin";</script>';
            }else{
                echo '<script> alert("Correo o password incorrectos"); window.location.href="../login";</script>';
            }
        }
    }
}