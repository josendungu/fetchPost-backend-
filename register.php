<?php
require_once 'core/init.php';

if(Input::exists()){
    $username = Input::get('username');
    $lname = Input::get('last_name');
    $fname = Input::get('first_name');
    $phone = Input::get('phone');
    $pass = Input::get('pass');
    $email = Input::get('email');

    $user = new User();
    $salt = Hash::salt(32);

    $data = array(
        'username' => $username,
        'fname' => $fname,
        'lname' => $lname,
        'salt' => $salt,
        'email' => $email,
        'password' => Hash::make($pass, $salt),
        'phone' => $phone
    );

    try{
        $user->create($data);
        echo "1";
    } catch(Exception $e) {
        echo $e;
    }
}







?>