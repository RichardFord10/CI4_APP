<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
  
class ApiController extends Controller
{

    public function index()
    { 
        unset($search_term);
        if(!isset($search_term))
        {
            $search_term = $this->input->get('makeup_type');

        }else{           
            
            $search_term = 'Eyebrow';
        }

        $searched_term = $this->send_makeup_api_request($search_term);
        $data = ['searched_term'=>$searched_term];
        return view('templates/header')
        .view('pages/makeup', $data)
        .view('templates/footer');

    }

    public function send_makeup_api_request($search_term){
    
    $options = [
        'baseURI' => 'http://makeup-api.herokuapp.com/api/v1/products.json?'.$search_term,
        'timeout' => 3,
    ];
    
    $client =  \Config\Services::curlrequest($options);
    $response = $client->request('GET', $options['baseURI']);
    return $response;
    
    }












}