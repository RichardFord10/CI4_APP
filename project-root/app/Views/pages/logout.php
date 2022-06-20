<?php $data = [
    'title' => 'Logout',
    'msg' => 'Logout Success!'
];
return view('templates/header',$data).view('/pages/login').view('templates/footer');
$this->session->setFlashData('success', 'Logout Successful');
$this->session->destroy();



?>