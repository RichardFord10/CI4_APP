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
        $data = $this->send_request('https://harvard-api.datausa.io/api/data?Geography=50000US1000&measure=Languages%20Spoken&drilldowns=Language Spoken at Home');

        return view('templates/header', ['title' => 'DataUsa API', 'data'=>$data])
            . view('apis/datausa')
            . view('templates/footer');
    }
        
}
        
?>