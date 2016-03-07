<?php

class WoT extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        // titulo
        $header['titulo'] = "World of Tanks";
        //fin
        // css header
        $style = array
        (
            '<link href="'.base_url().'asset/src/WoT/estilo_WoT.css" rel="stylesheet">',
            '<link href=\'https://fonts.googleapis.com/css?family=Fjalla+One\' rel=\'stylesheet\' type=\'text/css\'>'
        );
        $header['style'] = $style;
        //fin header
        //array para el footer
        $script = array
        (
            '<script src="'.base_url().'asset/src/WoT/WoT.js" type="text/javascript"></script>',
            '<script>
                    $(function(){
                        $("#menu_wot").addClass("active");
                    });
            </script>',
            '<script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(\'#tabs\').tab();
            });
        </script>'
        );
        $footer['script'] = $script;
        //fin footer

        $this -> load -> view ('plantilla/header', $header);
        $this -> load -> view ('plantilla/navbar');
        $this -> load -> view ('WoT/index');
        $this -> load -> view ('plantilla/footer', $footer);

    }

}
?>