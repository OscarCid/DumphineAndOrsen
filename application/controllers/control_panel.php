<?php

class Control_panel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this -> load -> model('Youtube_model');
    }

    function index()
    {
        if($this->session->userdata('logged_in'))
        {
            //codigo para saber la session de usuario
            $session_data = $this->session->userdata('logged_in');
            //fin
            // codigo para cargas style
            $style = array
            (
                '<link href="'.base_url().'asset/src/control_panel/control_panel.css" rel="stylesheet">',
            );
            $header['style'] = $style;
            $header['titulo'] = "Panel de Control";
            //fin
            // footer
            $script = array
            (
                '<script src="'.base_url().'asset/src/control_panel/control_panel.js" type="text/javascript"></script>'
            );
            $footer['script'] = $script;
            //fin
            //
            $user['username'] = $session_data['username'];
            //fin codigo para saber la session de usuario
            $this -> load -> view ('plantilla/header', $header);
            $this -> load -> view ('plantilla/vertical_navbar', $user);
            $this->load->view('control_panel/index');
            $this->load->view('plantilla/footer', $footer);
        }
        else
        {
            //If no session, redirect to login page
            redirect('/Youtube');
        }

    }
    function agregar_video()
    {
        if($this->session->userdata('logged_in'))
        {
            //codigo para saber la session de usuario
            $session_data = $this->session->userdata('logged_in');
            //fin
            // codigo para cargas style
            $style = array
            (
                '<link href="'.base_url().'asset/src/control_panel/control_panel.css" rel="stylesheet">',
            );
            $header['style'] = $style;
            $header['titulo'] = "Panel de Control";
            //fin
            // footer
            $script = array
            (
                '<script src="'.base_url().'asset/src/control_panel/control_panel.js" type="text/javascript"></script>',
                '<script>
                    $(function(){
                        $("#agregar_video").addClass("active");
                    });
                </script>\'
                '
            );
            $footer['script'] = $script;
            //fin
            //
            $user['username'] = $session_data['username'];
            //fin codigo para saber la session de usuario
            $this -> load -> view ('plantilla/header', $header);
            $this -> load -> view ('plantilla/vertical_navbar', $user);
            $this->load->view('control_panel/agregar_video');
            $this->load->view('plantilla/footer', $footer);
        }
        else
        {
            //If no session, redirect to login page
            redirect('/Youtube');
        }

    }

    function editar_videos()
    {
        if($this->session->userdata('logged_in'))
        {
            //codigo para saber la session de usuario
            $session_data = $this->session->userdata('logged_in');
            //fin
            // codigo para cargas style
            $style = array
            (
                '<link href="'.base_url().'asset/src/control_panel/control_panel.css" rel="stylesheet">',
            );
            $header['style'] = $style;
            $header['titulo'] = "Panel de Control";
            //fin
            // footer
            $script = array
            (
                '<script src="'.base_url().'asset/src/control_panel/control_panel.js" type="text/javascript"></script>',
                '<script>
                    $(function(){
                        $("#editar_videos").addClass("active");
                    });
                </script>
                '
            );
            $footer['script'] = $script;
            //fin
            //
            $data['videos'] = $this->Youtube_model->get_videos();
            $user['username'] = $session_data['username'];
            //fin codigo para saber la session de usuario
            $this -> load -> view ('plantilla/header', $header);
            $this -> load -> view ('plantilla/vertical_navbar', $user);
            $this->load->view('control_panel/editar_videos', $data);
            $this->load->view('plantilla/footer', $footer);
        }
        else
        {
            //If no session, redirect to login page
            redirect('/Youtube');
        }
    }

    function delete_video($id)
    {
        //delete employee record
        $this->db->where('id_video', $id);
        $this->db->delete('videos');
        redirect('control_panel/editar_videos');
    }

    function change_name()
    {
        $id_video = ($this->input->post('id_video'));
        $name = ($this->input->post('name'));

        $data = array(
            'ID_VIDEO' => $id_video,
            'NAME' => $name
        );

        if ($this->Youtube_model-> editar_nombre($data) == true)
        {
            $this->session->set_flashdata('category_success', 'El video se edito con exito! <img src="http://i600.photobucket.com/albums/tt82/moon20_album/emoticons/1313.gif">');
            $this->session->set_flashdata('tipo_alerta', 'success');
            $this->session->set_flashdata('icono', 'saved');
            redirect('/control_panel/editar_videos');
        }
        //if para enviar informacion de que el video ya existe en la lista
        else
        {
            $this->session->set_flashdata('tipo_alerta', 'warning');
            $this->session->set_flashdata('category_success', 'Error al modificar el video, intente nuevamente');
            $this->session->set_flashdata('icono', 'warning-sign');
            redirect('/control_panel/editar_videos');
        }
    }
}