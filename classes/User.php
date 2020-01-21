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
            $id = $this->data()->memebr_id;
        }

        if(!$this->_db->update('members', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
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