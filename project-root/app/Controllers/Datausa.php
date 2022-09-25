<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use CodeIgniter\HTTP\RequestInterface;
use stdClass;

$request = \Config\Services::request();





// ['data' => $this->send_makeup_request($search_term)]

$request = \Config\Services::request();


class Datausa extends ApiController
{

    public function index()
    { 
        return view('templates/header', ['title' => 'Makeup API'])
            . view('apis/datausa')
            . view('templates/footer');
    }
        
}
        
    

    

    

?>