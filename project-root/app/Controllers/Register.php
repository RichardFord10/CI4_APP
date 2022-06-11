<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class Register extends BaseController
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $data = ['title' => 'Register'];
        return view('templates/header', $data) .
                view('pages/register') .
                view('templates/footer');
    }
  
    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'user_name'     => 'required|min_length[3]|max_length[20]',
            'first_name'     => 'required|min_length[3]|max_length[20]',
            'last_name'      => 'required|min_length[3]|max_length[20]',
            'user_email'    => 'required|min_length[6]|max_length[50]|valid_email',
            'password'      => 'required|min_length[6]|max_length[200]',
        ];
          
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'user_name'     => $this->request->getPost('user_name'),
                'user_email'    => $this->request->getPost('user_email'),
                'first_name'    => $this->request->getPost('first_name'),
                'last_name'     => $this->request->getPost('last_name'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            $data = [
                'title' => 'Register',
                'message' => 'Successfully Register'
            ];
            return view('templates/header', $data) .
                    view('pages/login') .
                    view('templates/footer');
        }else{
            $data = [
                'title' => 'Register',
                'errors' => $this->validator->getErrors()
            ];
            return view('templates/header', $data) .
                view('pages/register') .
                view('templates/footer');
        }
          
    }
  
}