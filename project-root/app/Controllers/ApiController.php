<?php 

namespace App\Controllers;

use CodeIgniter\Controller;

use CodeIgniter\HTTP\RequestInterface;
use stdClass;

$request = \Config\Services::request();





// ['data' => $this->send_makeup_request($search_term)]



class ApiController extends Controller
{
    protected $request;

    public function index()
    { 
        if(!isset($_GET['product_type']))
        {

            return view('templates/header', ['title' => 'Makeup API'])
            . view('pages/makeup')
            . view('templates/footer');
            
        }
        else
        {
            $search_term = $this->request->getMethod('product_type');

            return view('templates/header', ['title' => 'Makeup API'])
            . view('pages/makeup',['data'=>$this->send_makeup_request($search_term)])
            . view('templates/footer');

        }
    }


    public function send_makeup_request($search_term)
    {
        if(isset($search_term))
        {
            $url = 'http://makeup-api.herokuapp.com/api/v1/products.json?'.$search_term;
            /* Init cURL resource */
            $ch = curl_init($url);
            /* set the content type json */
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            /* set return type json */
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            /* execute request */
            $result = curl_exec($ch);
            /* close cURL resource */
            curl_close($ch);

            $result = \json_decode($result);
            // print_r($result['id']);exit();
            return $result;
        }
    }
}
    

    