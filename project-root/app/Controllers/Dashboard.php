<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
  
class Dashboard extends Controller
{
    public function index()
    {
        $session = session();
        session()->setFlashData('message', 'Welcome back, ' . $session->get('username'));
        $data = [
            'title' => 'Dashboard',
        ];
        return view('templates/header', $data).view('pages/dashboard').view('templates/footer');
    }
}