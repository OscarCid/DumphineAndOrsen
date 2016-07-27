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

    function ultimo_dato()
    {
        $this->db->order_by('fecha','DESC');
        $this->db->limit(1);
        return $this->db->get('clima')->result();
    }

    function grafico()
    {
        $this->db->order_by('fecha','DESC');
        $this->db->limit(15,1);
        return $this->db->get('clima')->result();
    }

    function maxima($dato, $dia)
    {
        $this->db->select('fecha, '.$dato.'');
        $this->db->like('fecha', '-'.$dia.' ');
        $this->db->order_by($dato,'DESC');
        $this->db->limit(1);
        return $this->db->get('clima')->result();
    }

    function minima($dato, $dia)
    {
        $this->db->select('fecha, '.$dato.'');
        $this->db->like('fecha', '-'.$dia.' ');
        $this->db->order_by($dato,'ASC');
        $this->db->limit(1);
        return $this->db->get('clima')->result();
    }
}