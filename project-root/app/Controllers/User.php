<?php

namespace App\Controllers;

class User extends BaseController
{
  public function logout()
  {
    session()->destroy();
    $data = [
      'title' => 'Logout',
      'msg' => 'Logout Success!'
    ];
    return view('templates/header', $data) .
                view('pages/login') .
                view('templates/footer');
  }


}
