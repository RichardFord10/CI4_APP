<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class Login extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Login'];
        helper(['form']);
        return view('templates/header', $data).view('login').view('templates/footer');
    } 
  
    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getPost('user_email');
        $password = $this->request->getPost('password');
        $data = $model->where('user_email', $email)->first();
       if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'user_id'       => $data['user_id'],
                    'user_name'     => $data['user_name'],
                    'user_email'    => $data['user_email'],
                    'user_name'     => $data['user_name'],
                    'first_name'    => $data['first_name'],
                    'last_name'     => $data['last_name'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                $data = [
                    'title' => 'Login',
                ];
                $session->setFlashdata('success', 'Login Success!');
                return view('templates/header',$data).view('pages/dashboard').view('templates/footer');
            }else{
                $data = [
                    'title' => 'Login',
                ];
                $session->setFlashdata('fail', 'Wrong Password');
                return view('templates/header',$data).view('/pages/login').view('templates/footer');

            }
        }else{
            $session->setFlashdata('message', 'Email not Found');
            $data = [
                'title' => 'Login',
            ];
            return view('templates/header',$data).view('pages/login').view('templates/footer');
        }
    }
  
    public function logout()
    {
        $session = session();
        $session->destroy();
        $data = [
            'title' => 'Login',
        ];
        $session->setFlashData('success', 'Logout Success!');
        return view('templates/header',$data).view('/pages/login').view('templates/footer');
    }
} 