<?php
/**
 * Created by PhpStorm.
 * User: Orsen
 * Date: 20-02-2016
 * Time: 4:25
 */

class LoL extends CI_Controller
{
    public function index()
    {
        $data['estado_lol'] = "active";
        $this -> load -> view ('LoL/header');
        $this -> load -> view ('plantilla/navbar', $data);
        $this -> load -> view ('LoL/index');
        $this -> load -> view ('LoL/footer');
    }

    public function ultima_partida()
    {
        $data['titulo'] = "Ultima Partida";
        $this -> load -> view ('plantilla/header', $data);
        $this -> load -> view ('LoL/ultima_partida');
        $this -> load -> view ('plantilla/footer');
    }
}
?>