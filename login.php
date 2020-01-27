<?php
require_once 'core/init.php';
//basic funtionality: Check if the user exist.. If so then echo the member_id back to the app
//The app will then initialize an intent to the dashboard ativity passing the member_id


if(Input::exists()) {    
    
    $username = Input::get('username');
    $password = Input::get('pass');
    $user = new User();

    $member = $user->find($username);
    
    if($member){
        if($user->passMatch($password)){
            echo '1';
        } else {
            echo '3';
        }
    } else {
        echo '2';
    }
}else{
    echo 'no-params';
}

?>