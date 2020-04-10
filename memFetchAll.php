<?php 
require_once 'core/init.php';

if(Input::exists()){

    $db = DB::getInstance();
    $sql = "SELECT * FROM members ORDER BY member_id";
    $db->queryFetchAll($sql);
    if($db->error()){
        echo "10";
    } else {
        $myJsonArray = array();
        
        foreach($db->results() as $row){
            $myObj = array();
            $myObj["fname"] = $row['fname'];
            $myObj["lname"] = $row['lname']; 
            $myObj["username"] = $row['username'];
            $myObj["member_id"] = $row['member_id'];
            array_push($myJsonArray,$myObj);
        }
        $myJSON = json_encode($myJsonArray);
        echo $myJSON;
       
        
    }

}

?>