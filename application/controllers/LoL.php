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

        // array para el header (aqui van incluido el titulo del header y los css
        $style = array
        (
            '<link href="'.base_url().'asset/src/tipso/tipso.css" rel="stylesheet">',
            '<link href="'.base_url().'asset/src/tipso/animate.css" rel="stylesheet">',
            '<link href="'.base_url().'asset/src/LoL/estilo.css" rel="stylesheet">'
        );
        $header['style'] = $style;
        $header['titulo'] = "LoL!";


        //codigo para saber la session de usuario
        $session_data = $this->session->userdata('logged_in');
        $user['username'] = $session_data['username'];

        $this -> load -> view ('plantilla/header', $header);
        $this -> load -> view ('plantilla/navbar', $user);
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