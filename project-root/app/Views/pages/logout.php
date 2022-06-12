<?php $data = [
    'title' => 'Logout',
    'success' => 'Logout Success!'
];
session_destroy();
return view('templates/header',$data).view('/pages/login').view('templates/footer');



?>