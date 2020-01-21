<?php

require_once 'core/init.php';

if(Input::exists()){

    $username = Input::get('username');
    $password = Input::get('pass');
    $user = new User();

    $member = $user->find($username);
    $userPassHash = Hash::make($password, $user->data()->salt);
    $mem_id = $user->data()->member_id;


    if($member){
        try{
            $user->update(array(
                'password' => $userPassHash
            ));
            echo '1';
        } catch(Exception $e) {
            die($e->getMessage());
        }

    }else{
        echo '2';
    }

}



?>