<?php

class Clima_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function insertar_datos($data)
    {
        $query = "SELECT * FROM clima WHERE fecha='".$data['FECHA']."'";
        $consulta = $this->db->query($query);

        if($consulta->num_rows() == 0)
        {
            $this -> db -> insert ('clima',$data);
            return true;
        }
        else return false;
    }

    function ultimo_dato($data)
    {
        $this->db->order_by('name','ASC');
        $this->db->limit(10);
        $consulta = $this->db->get('videos');
        if($consulta->num_rows() > 0)
        {
            return $consulta;
        }
        else return false;
    }


}