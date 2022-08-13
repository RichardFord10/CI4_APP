<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ItemsModel;
  
class Dashboard extends Controller
{
    public function index()
    {
        $items_model = new ItemsModel();
        $items = $items_model->get_all_items();
        $chart = new Charts();
        $unique_colors = $chart->unique_colors();
        $unique_items = $chart->unique_items();



        $data = [
            'title' => 'Dashboard',
            'items' => $items, 
            'items_json' => $items,
            'unique_colors' => $unique_colors,
            'unique_items' => $unique_items,
        ];

        return view('templates/header', $data)
        .view('pages/dashboard')
        .view('templates/footer');
    }

    public function send_makeup_api_request(){

        $options = [
            'baseURI' => 'http://makeup-api.herokuapp.com/api/v1/products.json?',
            'timeout' => 3,
        ];

        $client =  \Config\Services::curlrequest($options);
        $response = $client->request('GET', $options['baseURI']);
        return $response;
        
    }
   
}