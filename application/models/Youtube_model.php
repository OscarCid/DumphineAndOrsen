<?php

class Youtube_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_videos()
    {
        $consulta = $this->db->get('videos');
        if($consulta->num_rows() > 0)
        {
            return $consulta;
        }
        else return false;
    }
}