<?php

require_once 'core/init.php';

if(Input::exists()){

    $username = Input::get('username');
    $password = Input::get('pass');
    $user = new User();

    $member = $user->find($username);


    if($member){
        try{
            $salt = Hash::salt(32);
            $user->update(array(
                'password' => Hash::make($password, $salt),
                'salt' => $salt
            ),$user->data()->member_id);
            echo '1';
        } catch(Exception $e) {
            die($e->getMessage());
            
        }

    }else{
        echo '2';
    }

}



?>