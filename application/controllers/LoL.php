<?php
/**
 * Created by PhpStorm.
 * User: Orsen
 * Date: 20-02-2016
 * Time: 4:25
 */

class LoL extends CI_Controller
{
    public function index()
    {
        $script = array
        (
                '<script src="'.base_url().'asset/src/LoL/LoL.js" type="text/javascript"></script>',
                '<script src="'.base_url().'asset/src/tipso/tipso.js" type="text/javascript"></script>',
                '<script>
                    $(function(){
                        $("#menu_lol").addClass("active");
                    });
                </script>'
        );
        $data['script'] = $script;

        // array para el header (aqui van incluido el titulo del header y los css
        $style = array
        (
            '<link href="'.base_url().'asset/src/tipso/tipso.css" rel="stylesheet">',
            '<link href="'.base_url().'asset/src/tipso/animate.css" rel="stylesheet">',
            '<link href="'.base_url().'asset/src/LoL/estilo.css" rel="stylesheet">'
        );
        $header['style'] = $style;
        $header['titulo'] = "LoL!";


        //codigo para saber la session de usuario
        $session_data = $this->session->userdata('logged_in');
        $user['username'] = $session_data['username'];

        $this -> load -> view ('plantilla/header', $header);
        $this -> load -> view ('plantilla/navbar', $user);
        $this -> load -> view ('LoL/index', $data);
        $this -> load -> view ('plantilla/footer');
    }

    public function ultima_partida($ID)
    {

        set_error_handler(
            create_function(
                '$severity, $message, $file, $line',
                'throw new ErrorException($message, $severity, $severity, $file, $line);'
            )
        );

        try
        {
            $data = file_get_contents("https://las.api.pvp.net/observer-mode/rest/consumer/getSpectatorGameInfo/LA2/".$ID."?api_key=b8e25ec6-f1e6-402a-862d-7a315196e650");
            $products = json_decode($data, true);

            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");

            echo json_encode($products);
        }
        catch (Exception $e)
        {
            header("HTTP/1.0 404 Not Found");
        }

        restore_error_handler();
    }

    /* Esta mierda, es para esconder la APIKEY de RIOT, ya que rito culiao le pone color con la key hay que hacer este manso
     webeo para esconder GG IZI PIZI RITO*/

    public function data($switch, $ID)
    {
        $APIKEY = "b8e25ec6-f1e6-402a-862d-7a315196e650";

        switch ($switch)
        {
            // VERSION DDRAGON https://developer.riotgames.com/api/methods#!/1055/3630
            case "ddragon":
            {
                set_error_handler(
                    create_function(
                        '$severity, $message, $file, $line',
                        'throw new ErrorException($message, $severity, $severity, $file, $line);'
                    )
                );

                try
                {
                    $data = file_get_contents("https://global.api.pvp.net/api/lol/static-data/las/v1.2/versions?api_key=".$APIKEY);
                    $products = json_decode($data, true);

                    header("Access-Control-Allow-Origin: *");
                    header("Content-Type: application/json; charset=UTF-8");

                    echo json_encode($products);
                }
                catch (Exception $e)
                {
                    header("HTTP/1.0 404 Not Found");
                }

                restore_error_handler();
                break;
            }

            // VERSION DDRAGON https://developer.riotgames.com/api/methods#!/1079/3722
            case "summoner":
            {
                set_error_handler(
                    create_function(
                        '$severity, $message, $file, $line',
                        'throw new ErrorException($message, $severity, $severity, $file, $line);'
                    )
                );

                try
                {
                    $data = file_get_contents("https://na.api.pvp.net/api/lol/las/v1.4/summoner/by-name/".$ID."?api_key=".$APIKEY);
                    $products = json_decode($data, true);

                    header("Access-Control-Allow-Origin: *");
                    header("Content-Type: application/json; charset=UTF-8");

                    echo json_encode($products);
                }
                catch (Exception $e)
                {
                    header("HTTP/1.0 404 Not Found");
                }

                restore_error_handler();
                break;
            }

            /* LAST MATCH, pico me dio paja ver el link jaja*/
            case "last_match":
            {
                set_error_handler(
                    create_function(
                        '$severity, $message, $file, $line',
                        'throw new ErrorException($message, $severity, $severity, $file, $line);'
                    )
                );

                try
                {
                    $data = file_get_contents("https://las.api.pvp.net/api/lol/las/v1.3/game/by-summoner/".$ID."/recent?api_key=".$APIKEY);
                    $products = json_decode($data, true);

                    header("Access-Control-Allow-Origin: *");
                    header("Content-Type: application/json; charset=UTF-8");

                    echo json_encode($products);
                }
                catch (Exception $e)
                {
                    header("HTTP/1.0 404 Not Found");
                }

                restore_error_handler();
                break;
            }

            /* INFORMACION DE LOS CAMPEONES, pico me dio paja ver el link jaja*/
            case "champ_info":
            {
                set_error_handler(
                    create_function(
                        '$severity, $message, $file, $line',
                        'throw new ErrorException($message, $severity, $severity, $file, $line);'
                    )
                );

                try
                {
                    $data = file_get_contents("https://global.api.pvp.net/api/lol/static-data/na/v1.2/champion/".$ID."?api_key=".$APIKEY);
                    $products = json_decode($data, true);

                    header("Access-Control-Allow-Origin: *");
                    header("Content-Type: application/json; charset=UTF-8");

                    echo json_encode($products);
                }
                catch (Exception $e)
                {
                    header("HTTP/1.0 404 Not Found");
                }

                restore_error_handler();
                break;
            }

            /* LIGA DEL SUMMONER, pico me dio paja ver el link jaja*/
            case "summoner_league":
            {
                set_error_handler(
                    create_function(
                        '$severity, $message, $file, $line',
                        'throw new ErrorException($message, $severity, $severity, $file, $line);'
                    )
                );

                try
                {
                    $data = file_get_contents("https://las.api.pvp.net/api/lol/las/v2.5/league/by-summoner/".$ID."/entry?api_key=".$APIKEY);
                    $products = json_decode($data, true);

                    header("Access-Control-Allow-Origin: *");
                    header("Content-Type: application/json; charset=UTF-8");

                    echo json_encode($products);
                }
                catch (Exception $e)
                {
                    header("HTTP/1.0 404 Not Found");
                }

                restore_error_handler();
                break;
            }

            /* INFO de los SPELL SUMMONER, pico me dio paja ver el link jaja*/
            case "summoner_spell":
            {
                set_error_handler(
                    create_function(
                        '$severity, $message, $file, $line',
                        'throw new ErrorException($message, $severity, $severity, $file, $line);'
                    )
                );

                try
                {
                    $data = file_get_contents("https://global.api.pvp.net/api/lol/static-data/las/v1.2/summoner-spell/".$ID."?spellData=tooltip&api_key=".$APIKEY);
                    $products = json_decode($data, true);

                    header("Access-Control-Allow-Origin: *");
                    header("Content-Type: application/json; charset=UTF-8");

                    echo json_encode($products);
                }
                catch (Exception $e)
                {
                    header("HTTP/1.0 404 Not Found");
                }

                restore_error_handler();
                break;
            }

            /* INFO de los ITEMS CULIAOS!, pico me dio paja ver el link jaja*/
            case "summoner_items":
            {
                set_error_handler(
                    create_function(
                        '$severity, $message, $file, $line',
                        'throw new ErrorException($message, $severity, $severity, $file, $line);'
                    )
                );

                try
                {
                    $data = file_get_contents("https://global.api.pvp.net/api/lol/static-data/las/v1.2/item/".$ID."?itemData=sanitizedDescription&api_key=".$APIKEY);
                    $products = json_decode($data, true);

                    header("Access-Control-Allow-Origin: *");
                    header("Content-Type: application/json; charset=UTF-8");

                    echo json_encode($products);
                }
                catch (Exception $e)
                {
                    header("HTTP/1.0 404 Not Found");
                }

                restore_error_handler();
                break;
            }

            case "season":
            {
                set_error_handler(
                    create_function(
                        '$severity, $message, $file, $line',
                        'throw new ErrorException($message, $severity, $severity, $file, $line);'
                    )
                );

                try
                {
                    $data = file_get_contents("https://las.api.pvp.net/api/lol/las/v1.3/stats/by-summoner/".$ID."/ranked?season=SEASON2016&api_key=".$APIKEY);
                    $products = json_decode($data, true);

                    header("Access-Control-Allow-Origin: *");
                    header("Content-Type: application/json; charset=UTF-8");

                    echo json_encode($products);
                }
                catch (Exception $e)
                {
                    header("HTTP/1.0 404 Not Found");
                }

                restore_error_handler();
                break;
            }

            default:
                header("HTTP/1.0 404 Not Found");
                break;
        }
    }

    
}
?>