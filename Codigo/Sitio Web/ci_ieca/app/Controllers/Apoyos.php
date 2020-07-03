<?php namespace App\Controllers;

use App\Models\AutBec;
use App\Models\Becas;
use CodeIgniter\Controller;

class Apoyos extends Controller{

    private $becas;
    private $autbec;

    public function __construct(){
        $this->becas = new Becas();
        $this->autbec = new AutBec();
    }

    public function index(){
        $data = ['titulo' => 'Conoce nuestros apoyos', 'becas' => $this->becas->getListar(), 'autbec' => $this->autbec->getListar(), 'faicon' => 'fa-paper-plane mr-3'];
        return view('apoyos', $data);
    }

}

?>