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
        //codigo para saber la session de usuario
        $session_data = $this->session->userdata('logged_in');
        $user['username'] = $session_data['username'];
        //fin codigo para saber la session de usuario
        /* preparando data para enviar a la vista, aqui se envia datos desde el modelo (lista canciones) */
        $data['videos'] = $this->Youtube_model->get_videos();
        // aca se prepara el array con las librerias especificas para la vista ya que se utiliza una plantilla generica para el footer y el header
        //array para el footer
        $script = array
        (
            '<script src="'.base_url().'asset/src/scrollbar-plugin/jquery.mCustomScrollbar.js" type="text/javascript"></script>',
            '<script src="'.base_url().'asset/src/youtube/youtube.js" type="text/javascript"></script>',
            '<script>
                    $(function(){
                        $("#menu_youtube").addClass("active");
                    });
                </script>'
        );
        $footer['script'] = $script;
        // array para el header (aqui van incluido el titulo del header y los css
        $style = array
        (
            '<link href="'.base_url().'asset/src/youtube/estilo_youtube.css" rel="stylesheet">',
            '<link href="'.base_url().'asset/src/scrollbar-plugin/jquery.mCustomScrollbar.css" rel="stylesheet">'
        );
        $header['style'] = $style;
        $header['titulo'] = "Youtube!";
        $this -> load -> view ('plantilla/header', $header);
        $this -> load -> view ('plantilla/navbar', $user);
        $this -> load -> view ('Youtube/index', $data);
        $this -> load -> view ('plantilla/footer', $footer);
    }

    function Insertar_video()
    {
        if($this->session->userdata('logged_in'))
        {
            //codigo para saber la session de usuario
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            //fin codigo para saber la session de usuario
            $header['titulo'] = "Insertar Nuevo Video";
            $this->load->view('plantilla/header', $header);
            $this->load->view('plantilla/navbar', $data);
            $this->load->view('Youtube/insertar_video');
            $this->load->view('plantilla/footer');
        }
        else
            {
                //If no session, redirect to login page
                redirect('/Youtube');
            }
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
        //if para revisar si es valida la url ingresada
        if($data['NAME'] == '' or $id_video == '0') //Also tried this "if(strlen($strTemp) > 0)"
        {
            $this->session->set_flashdata('category_success', 'El video no existe, revisa la URL he intente nuevamente');
            $this->session->set_flashdata('tipo_alerta', 'danger');
            $this->session->set_flashdata('icono', 'remove');
            redirect('/Youtube');
        }

        //if para enviar informacion de que el video se subio de forma correcta
        if ($this->Youtube_model-> insertar_video($data) == true)
        {
            $this->session->set_flashdata('category_success', 'El video se a agregado con exito!');
            $this->session->set_flashdata('tipo_alerta', 'success');
            $this->session->set_flashdata('icono', 'saved');
            redirect('/Youtube');
        }
        //if para enviar informacion de que el video ya existe en la lista
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