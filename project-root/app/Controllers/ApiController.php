<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\Makeup;


use CodeIgniter\HTTP\RequestInterface;
use stdClass;

$request = \Config\Services::request();





// ['data' => $this->send_makeup_request($search_term)]



class ApiController extends Controller
{
    protected $request;

    public function index()
    { 

       return $this->makeup_page();
        
    }


    public function datausa()
    {
        $data = $this->send_request('https://datausa.io/api/');

        return $data;

    }

    public function makeup_page()
    {
        $makeup = new Makeup();

        return $makeup->index();
    }

    public function send_request($baseurl, $search_term = NULL, $options = NULL)
    {
        if(isset($baseurl))
        {
            /* Init cURL resource */
            if(isset($search_term))
            {
                $ch = \curl_init($baseurl.$search_term.$options);
            }else{
                $ch = \curl_init($baseurl);
            }
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
    

    