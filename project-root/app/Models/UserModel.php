<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public $table = 'users';
    public $allowedFields = ['user_id','user_name', 'user_email', 'password', 'first_name', 'last_name'];

    public function get_user($email){

        return $this->where(['user_email' => $email])->first();

    }






}