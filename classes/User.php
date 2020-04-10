<?php

class User {
    private $_db,
            $_data,
            $_sessionName,
            $_cookieName,
            $isLoggedIn;

    public function __construct($user = null) {//in use
        $this->_db = DB::getInstance();
        $this->find($user);
    }

    public function create($fields = array()) {
        if(!$this->_db->insert('members', $fields)) {
            throw new Exception('Sorry, there was a problem creating your account;');
        }
    }

     
    

    public function update($fields = array(), $id = null) {

        if(!$id) {
            $id = $this->data()->member_id;
        }

        if(!$this->_db->update('members', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }

    public function getAll(){

        $myObj = array(
            "fname"=> $this->data()->fname, 
            "lname"=>$this->data()->lname, 
            "username"=>$this->data()->username, 
            "phone"=>$this->data()->phone,
            "email"=>$this->data()->email
        );

        $myJSON = json_encode($myObj);
        return $myJSON;
    
    }

    public function find($user = null) {
        if($user) {
            $field = (is_numeric($user)) ? 'id' : 'username';
            $data = $this->_db->get('members', array($field, '=', $user));

            if($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    public function findByElement($element, $value){
        $data = $this->_db->get('members', array($element, '=', $value));

        if($data->count()){
            $this->_data = $data->first();
            return true;
        }
    }

    public function passMatch($pass){
        if($this->data()->password === Hash::make($pass, $this->data()->salt)){
            return true;
        } else {
            return false;
        }
    }



    public function exists() {
        return (!empty($this->_data)) ? true : false;
    }


    public function data(){
        return $this->_data;
    }

   
}