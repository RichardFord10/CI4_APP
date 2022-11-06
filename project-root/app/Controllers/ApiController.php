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
        $url = \current_url();
        if(strpos($url, '/index'))
        {
            return $this->api_page();

        }
        elseif(strpos($url, '/makeup'))
        {
            return $this->makeup_page();

        }elseif(strpos($url, '/datausa'))
        {
            return $this->datausa_page();
        }
    }

   /****************PAGES*********************************/
    public function datausa_page()
    {
        $d = new Datausa();
        return $d->index();
    }

    public function makeup_page()
    {
        $makeup = new Makeup();
        return $makeup->index();
    }

    public function api_page()
    {
        return view('templates/header', ['title' => 'API Workings'])
        . view('apis/index')
        . view('templates/footer');
    }
    /****************END PAGES*********************************/


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
    

    