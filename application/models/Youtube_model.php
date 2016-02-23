<?php

class Youtube_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function insertar_video($data)
    {
        $query = "SELECT * FROM videos WHERE id_video='".$data['ID_VIDEO']."'";
        $consulta = $this->db->query($query);

        if($consulta->num_rows() == 0)
        {
            $this -> db -> insert ('videos',$data);
            return true;
        }
        else return false;
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