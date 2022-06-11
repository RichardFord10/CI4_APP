<?php namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // if user not logged in
        if(! session()->get('logged_in')){
        // then redirct to login page
        $data = ['title' => 'Login'];
            return view('templates/header', $data).view('pages/dashboard').view('templates/footer');
        }
    }
    //--------------------------------------------------------------------
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $data = ['title' => 'Dashboard'];
        session()->setFlashdata('success', 'Login Success!');
        return view('templates/header', $data).view('pages/dashboard').view('templates/footer');
    }
}