<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use CodeIgniter\HTTP\RequestInterface;
use stdClass;

$request = \Config\Services::request();





// ['data' => $this->send_makeup_request($search_term)]

$request = \Config\Services::request();


class Makeup extends ApiController
{

    public function index()
    {
        $search_term = '';
        $url = 'http://makeup-api.herokuapp.com/api/v1/products.json?';

        if(!isset($_GET['makeup_form']))
        {
            //initial page load
            return view('templates/header', ['title' => 'Makeup API'])
            . view('apis/makeup')
            . view('templates/footer');
        
        }else{

                if(isset($_GET['product_type']))
                {
                    $product_type   = '&product_type='.$_GET['product_type'];
                    $search_term    = $product_type;
                    $data           = $this->send_request($url.$search_term);
                    
                    return view('templates/header', ['title' => 'Makeup API'])
                    . view('apis/makeup', [ 'data'=>$data])
                    . view('templates/footer');
                    
                }elseif(isset($_GET['brand']))
                {
                    $brand          = '&brand='.$_GET['brand'];
                    $search_term    = $brand;
                    $data           = $this->send_request($url.$search_term);
                    
                    return view('templates/header', ['title' => 'Makeup API'])
                    . view('apis/makeup', [ 'data'=>$data])
                    . view('templates/footer');

                }else
                {
                    $brand          = '&brand='.$_GET['brand'];
                    $product_type   = '&product_type='.$_GET['product_type'];
                    $search_term    = $product_type.$brand;
                    $data           = $this->send_request($url.$search_term);
                    
                    return view('templates/header', ['title' => 'Makeup API'])
                    . view('apis/makeup', ['data'=>$data])
                    . view('templates/footer');
                }
                
            }
        
    }
}
    

    

?>