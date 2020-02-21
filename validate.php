<?php
require_once 'core/init.php';
if(Input::exists()){
    
    if(Input::itemExists("username")){
        $username = Input::get('username');
        $user = new User();
        if($user->find($username)){
            echo "1";
        } else {
            echo "doesnt";
        }

    }
  

    if(Input::itemExists("email")){
        $email = Input::get('email');
        $user = new User();
        if($user->findByElement("email",$email)){
            echo "1";
        } else {
            echo "doesnt";
        }
        
    }

    

} else {
    echo "10";
}

?>