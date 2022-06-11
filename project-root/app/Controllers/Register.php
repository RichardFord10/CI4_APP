<?php
use App\Controllers\BaseController;
use App\Models\UserModel;

class Register extends BaseController{

    public function index()
    {
        $data = [
            'title' => 'Register',
        ];
        helper(['form']);
        return view('templates/header', $data)
        . view('register')
        . view('templates/footer');

    }

    public function creatUser()
    {
        $model = model(UserModel::class);
        if ($this->request->getMethod() === 'post' && $this->validate([
            'user_email' => 'required|min_length[3]|max_length[255]',
            'user_name' => 'required|min_length[3]|max_length[255]',
            'password' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
        ])) {
            $model->save([
                'user_email' => $this->request->getPost('email'),
                'user_name'  => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'first_name' => $this->request->getPost('firstname'),
                'last_name' => $this->request->getPost('lastname')
            ]);

            return view('login');
        }

        return view('templates/header', ['title' => 'New User'])
            . view('register')
            . view('templates/footer');
    }



}