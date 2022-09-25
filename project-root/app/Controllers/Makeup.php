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
        if(!isset($_GET['makeup_form']))
        {
            $search_term = NULL;

            $_SESSION['search'] = $search_term;
            return view('templates/header', ['title' => 'Makeup API'])
            . view('apis/makeup')
            . view('templates/footer');

            
        }else{

            $search_term = '';
            $url = 'http://makeup-api.herokuapp.com/api/v1/products.json?';
            
            $product_type    = '&product_type=';
            $product_type   .= isset($_GET['product_type']) ? $_GET['product_type'] : NULL ;
            $brand           = '&brand=';
            $brand          .= isset($_GET['brand']) ? $_GET['brand'] : NULL;
            
            if(strpos($product_type, 'All'))
            {
                $product_type = NULL;
                
            }
            if(strpos($brand, 'All'))
            {
                $brand = NULL;
            }
            
            $search_term = $product_type.$brand;
            
            $data           = $this->send_request($url.$search_term);
            
            $_SESSION['search'] = $search_term;
            return view('templates/header', ['title' => 'Makeup API'])
            . view('apis/makeup', ['data'=>$data])
            . view('templates/footer');
        }
    }
        
}
        
    

    

    

?>