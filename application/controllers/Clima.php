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

    public function index()
    {
        $script = array
        (
            '<script src="'.base_url().'asset/src/Clima/Clima.js" type="text/javascript"></script>',
            '<script src="'.base_url().'asset/src/highchart/highcharts.js" type="text/javascript"></script>',
            '<script src="'.base_url().'asset/src/highchart/themes/dark-unica.js"></script>',
            '<script src="'.base_url().'asset/src/highchart/highcharts-more.js" type="text/javascript"></script>',
            '<script>
                    $(function(){
                        $("#menu_clima").addClass("active");
                    });
                </script>'
        );
        $data['script'] = $script;

        // array para el header (aqui van incluido el titulo del header y los css
        $style = array
        (
            '<link href="'.base_url().'asset/src/tipso/tipso.css" rel="stylesheet">',
            '<link href="'.base_url().'asset/src/Clima/Clima.css" rel="stylesheet">',
            '<link href="'.base_url().'asset/src/tipso/animate.css" rel="stylesheet">'
        );
        $header['style'] = $style;
        $header['titulo'] = "Estación Meteorológica RasPi3";


        //codigo para saber la session de usuario
        $session_data = $this->session->userdata('logged_in');
        $user['username'] = $session_data['username'];

        $this -> load -> view ('plantilla/header', $header);
        $this -> load -> view ('plantilla/navbar', $user);
        $this -> load -> view ('Clima/index', $data);
        $this -> load -> view ('plantilla/footer');
    }

    /** Controlador para la insercion de los datos mediante la RasPi3, mediante el codigo de la raspi inserto los datos de los sensores gg izi pizi ando en bici */
    public function insertar_datos()
    {
        $fecha = ($this->input->post('fecha'));
        $temp = ($this->input->post('temp'));
        $temp_DHT11 = ($this->input->post('tempDHT11'));
        $temp_BMP180 = ($this->input->post('tempBMP180'));
        $humedad = ($this->input->post('humedad'));
        $presion = ($this->input->post('presion'));
        $altitud = ($this->input->post('altitud'));

        $data = array(
            'FECHA' => $fecha,
            'TEMPERATURA' => $temp,
            'TEMPERATURA_DHT' => $temp_DHT11,
            'TEMPERATURA_BMP' => $temp_BMP180,
            'HUMEDAD' => $humedad,
            'PRESION' => $presion,
            'ALTITUD' => $altitud
        );

        $this->Clima_model-> insertar_datos($data);
    }

    public function ultimo_dato()
    {
        $arr = $this->Clima_model-> ultimo_dato();
        header('Content-Type: application/json');
        echo json_encode( $arr, JSON_NUMERIC_CHECK );
    }

    public function ultimo_temp()
    {
        // Set the JSON header
        header("Content-type: text/json");
        // The x value is the current JavaScript time, which is the Unix time multiplied
        // by 1000.

        $datos = $this->Clima_model-> ultimo_dato();

        $ret = array($datos[0]->fecha,floatval($datos[0]->temperatura),floatval($datos[0]->temperatura_dht),floatval($datos[0]->temperatura_bmp));
        echo json_encode($ret, JSON_NUMERIC_CHECK);
    }

    public function ultimo_dato_grafico($dato)
    {
        // Set the JSON header
        header("Content-type: text/json");
        // The x value is the current JavaScript time, which is the Unix time multiplied
        // by 1000.

        $datos = $this->Clima_model-> ultimo_dato();

        $ret = array($datos[0]->fecha,floatval($datos[0]->$dato));
        echo json_encode($ret, JSON_NUMERIC_CHECK);
    }

    public function temp_20min()
    {
        header("Content-type: text/json");
        $datos = $this->Clima_model-> grafico();
        
        $category = array();
        $category['name'] = 'Fecha';

        $series1 = array();
        $series1['name'] = 'Sensor DS18B20';

        $series2 = array();
        $series2['name'] = 'Sensor DHT11';

        $series3 = array();
        $series3['name'] = 'Sensor BMP180';

        foreach (array_reverse($datos) as $row)
        {
            $category['data'][] = $row->fecha;
            $series1['data'][] = floatval($row->temperatura);
            $series2['data'][] = floatval($row->temperatura_dht);
            $series3['data'][] = floatval($row->temperatura_bmp);
        }

        $result = array();
        array_push($result,$category);
        array_push($result,$series1);
        array_push($result,$series2);
        array_push($result,$series3);

        print json_encode($result, JSON_NUMERIC_CHECK);
    }

    public function obtener_maximo($dato, $fecha, $max_min)
    {

        switch ($fecha)
        {
            case "hoy":
            {
                $date = date("d");
                $arr = $this->Clima_model-> $max_min($dato, $date);
                header('Content-Type: application/json');
                echo json_encode( $arr, JSON_NUMERIC_CHECK );
                break;
            }
            case "ayer":
            {
                $date = date("d", strtotime('-24 hours', time()));
                $arr = $this->Clima_model-> $max_min($dato, $date);
                header('Content-Type: application/json');
                echo json_encode( $arr, JSON_NUMERIC_CHECK );
                break;
            }
            default:
            {
                echo 'esta fallando el case';
            }
        }
    }
}
?>