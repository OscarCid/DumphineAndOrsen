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
        $script = array
        (
                '<script src="'.base_url().'asset/src/LoL/LoL.js" type="text/javascript"></script>',
                '<script src="'.base_url().'asset/src/tipso/tipso.js" type="text/javascript"></script>',
                '<script>
                    $(function(){
                        $("#menu_lol").addClass("active");
                    });
                </script>'
        );
        $data['script'] = $script;
        $this -> load -> view ('LoL/header');
        $this -> load -> view ('plantilla/navbar');
        $this -> load -> view ('LoL/index', $data);
        $this -> load -> view ('plantilla/footer');
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