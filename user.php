<?php

class User{
    public $username='';
    public $password = '';
    public $email = '';

    public function check_password( $password ){
        if(strlen($password)<12){
            echo 'password must be longer than 12 characters';
        }else if(!preg_match('/[A-Z]/', $password)){
            echo 'password must contain at least one upper case letter';
        }else if(!preg_match('/[a-z]/', $password)) {
            echo 'password must contain at least one lower case letter';
        }else if(!preg_match('/[^a-zA-Z0-9]/', $password)){
            echo 'password must contain at least one special character';
        }
    }
    public function validate_email($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo 'email must be valid';
        }
    }

    public function copy_with(User $targetUser, $username = null, $email = null, $age = null){
        $targetUser->username = $name ?? $this->username;
        $targetUser->email = $email ?? $this->email;
        $targetUser->password = $age ?? $this->password;
    }
}