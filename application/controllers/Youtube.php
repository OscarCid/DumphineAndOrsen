<?php
/**
 * Created by PhpStorm.
 * User: Orsen
 * Date: 20-02-2016
 * Time: 4:25
 */
class Youtube extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this -> load -> helper('form');
        $this -> load -> model('Youtube_model');
        $this->load->library('session');
    }

    function index()
    {
        $data['videos'] = $this->Youtube_model->get_videos();
        $data['alerta'] = "";
        $this -> load -> view ('Youtube/header');
        $this -> load -> view ('plantilla/navbar');
        $this -> load -> view ('Youtube/index', $data);
        $this -> load -> view ('Youtube/footer');
    }

    function Insertar_video()
    {
        $this -> load -> view ('plantilla/header');
        $this -> load -> view ('plantilla/navbar');
        $this -> load -> view ('Youtube/insertar_video');
        $this -> load -> view ('Youtube/footer');
    }

    function recibirDatos_video()
    {
        //codigo para acortar url y solo dejar id del video
        $id_video = ($this->input->post('id_video'));
        $datos = explode("v=", $id_video);
        $id_video = substr($datos[1], 0, 11);
        //fin codigo para acortar url y solo dejar id del video

        //codigo para obtener nombre del video de forma automatica
        $content = file_get_contents("http://youtube.com/get_video_info?video_id=".$id_video);
        parse_str($content, $ytarr);
        $nombre = $ytarr['title'];
        //fin codigo para obtener nombre del video de forma automatica

        //codigo para enviar los datos al modelo y retorne la respuesta dependiendo si el video ya se encuentra en la lista o no
        $data = array(
            'ID_VIDEO' => $id_video,
            'NAME' => $nombre
        );
        //fin codigo para enviar los datos al modelo y retorne la respuesta dependiendo si el video ya se encuentra en la lista o no

        //aqui comienza el retorno de informacion a la vista y existen tres posibilidades
        if($data[NAME] == '' or $id_video == '0') //Also tried this "if(strlen($strTemp) > 0)"
        {
            $this->session->set_flashdata('category_success', 'El video no existe, revisa la URL he intente nuevamente');
            $this->session->set_flashdata('tipo_alerta', 'danger');
            $this->session->set_flashdata('icono', 'remove');
            redirect('/Youtube');
        }

        if ($this->Youtube_model-> insertar_video($data) == true)
        {
            $this->session->set_flashdata('category_success', 'El video se a agregado con exito! :D.');
            $this->session->set_flashdata('tipo_alerta', 'success');
            $this->session->set_flashdata('icono', 'saved');
            redirect('/Youtube');
        }
        else
        {
            $this->session->set_flashdata('tipo_alerta', 'warning');
            $this->session->set_flashdata('category_success', 'El video ya se encuentra en la lista, intenta nuevamente');
            $this->session->set_flashdata('icono', 'warning-sign');
            redirect('/Youtube');
        }

    }

}
?>