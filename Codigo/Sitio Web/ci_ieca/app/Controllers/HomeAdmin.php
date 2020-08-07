<?php namespace App\Controllers;

use CodeIgniter\Controller;

class HomeAdmin extends Controller{
    private $curso;

    public function index(){
        return view('admin/index');
    }

    public function logout(){
        $session = session();
        $session->destroy();
        echo '<script> window.location.href="../Home";</script>';
    }

}