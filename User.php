<?php 
    include_once('config.php');

    class User{
        public $id;
        public $name;
        public $email;
        public $password;
        public $phone;
        public $address;
        public $role;

        public function __construct($id, $name, $email, $password, $phone, $address, $role){
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->phone = $phone;
            $this->address = $address;
            $this->role = $role;
        }
    }
?>