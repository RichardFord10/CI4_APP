<?php namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // if user not logged in
        if(!session()->get('logged_in')){
        // then redirct to login page
        $data = ['title' => 'Login'];
            return view('templates/header', $data).view('pages/login').view('templates/footer');
        }
    }
    //--------------------------------------------------------------------
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $data = ['title' => 'Dashboard', 
            'user_name' => session()->get('user_name'),
            'user_email' => session()->get('user_email'),
            'user_id' => session()->get('user_id')
            ];
        
        return view('templates/header', $data, ).view('pages/dashboard', 'Login Success!').view('templates/footer');
    }
}