<?php
class Clima extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this -> load -> helper('form');
        $this -> load -> model('Clima_model');
        $this->load->library('session');
    }

    public function index()
    {
        $script = array
        (
            '<script src="'.base_url().'asset/src/Clima/Clima.js" type="text/javascript"></script>',
            '<script>
                    $(function(){
                        $("#menu_clima").addClass("active");
                    });
                </script>'
        );
        $data['script'] = $script;

        // array para el header (aqui van incluido el titulo del header y los css
        $style = array
        (
            '<link href="'.base_url().'asset/src/tipso/tipso.css" rel="stylesheet">',
            '<link href="'.base_url().'asset/src/tipso/animate.css" rel="stylesheet">'
        );
        $header['style'] = $style;
        $header['titulo'] = "Estación Meteorológica RasPi3";


        //codigo para saber la session de usuario
        $session_data = $this->session->userdata('logged_in');
        $user['username'] = $session_data['username'];

        $this -> load -> view ('plantilla/header', $header);
        $this -> load -> view ('plantilla/navbar', $user);
        $this -> load -> view ('Clima/index', $data);
        $this -> load -> view ('plantilla/footer');
    }

    /** Controlador para la insercion de los datos mediante la RasPi3, mediante el codigo de la raspi inserto los datos de los sensores gg izi pizi ando en bici */
    public function insertar_datos()
    {
        $fecha = ($this->input->post('fecha'));
        $temp = ($this->input->post('temp'));
        $humedad = ($this->input->post('humedad'));
        $presion = ($this->input->post('presion'));
        $altitud = ($this->input->post('altitud'));

        $data = array(
            'FECHA' => $fecha,
            'TEMPERATURA' => $temp,
            'HUMEDAD' => $humedad,
            'PRESION' => $presion,
            'ALTITUD' => $altitud
        );

        $this->Clima_model-> insertar_datos($data);
    }

    public function ultimo_dato()
    {
        $arr = $this->Clima_model-> ultimo_dato();
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: http://localhost');
        echo json_encode( $arr );
    }

}
?>