<?php
/**
 * Created by PhpStorm.
 * User: Orsen
 * Date: 20-02-2016
 * Time: 4:25
 */

class Youtube extends CI_Controller
{
    public function index()
    {
        $this -> load -> view ('Youtube/header');
        $this -> load -> view ('plantilla/navbar');
        $this -> load -> view ('Youtube/index');
        $this -> load -> view ('Youtube/footer');
    }
}
?>