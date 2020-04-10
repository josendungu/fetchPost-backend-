<?php
require_once 'core/init.php';
if(Input::exists()){

    if(Input::itemExists("username")){
        $username = Input::get('username');
        $user  = new User($username);
        if($user->exists()){
            echo $user->getAll();
        } else {
            echo $username;
        }


    } else {
        echo "11";
    }

} else{
    echo "10";
}


?>