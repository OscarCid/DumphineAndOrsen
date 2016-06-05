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
}
?>