<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use CodeIgniter\HTTP\RequestInterface;
use stdClass;

$request = \Config\Services::request();


class Datausa extends ApiController
{

    public function index()
    {   
        $info = $this->send_request('https://datausa.io/api/data?drilldowns=State&measures=Population&year=latest');
        // $data_array = json_decode(json_encode($info));
        // get_object_vars($info);

        foreach($info as $key=>$value)
        {
        }


        return view('templates/header', ['title' => 'DataUsa API', 'datausa'=>$info])
            . view('apis/datausa')
            . view('templates/footer');

            
    }
        
}
        
?>