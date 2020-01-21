<?php
require_once 'core/init.php';
//basic funtionality: Check if the user exist.. If so then echo the member_id back to the app
//The app will then initialize an intent to the dashboard ativity passing the member_id


if(Input::exists()) {    
    
    $username = Input::get('username');
    $password = Input::get('pass');
    $user = new User();

    $member = $user->find($username);
    $userPassHash = Hash::make($password, $user->data()->salt);
    $dbPassHash = $user->data()->password;
    

  
    if($member){
        if( $userPassHash === $dbPassHash){
            echo $user->data()->password;
        } else {
            echo 'dont';
        }
    } else {
        echo 'member doesnt exist';
    }
}else{
    echo 'no-params';
}

?>