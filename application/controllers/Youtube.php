<?php
/**
 * Created by PhpStorm.
 * User: Orsen
 * Date: 20-02-2016
 * Time: 4:25
 */

class Youtube extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Youtube_model');
    }

    public function index()
    {
        $data['videos'] = $this->Youtube_model->get_videos();
        $this -> load -> view ('Youtube/header');
        $this -> load -> view ('plantilla/navbar');
        $this -> load -> view ('Youtube/index', $data);
        $this -> load -> view ('Youtube/footer');
    }
}
?>