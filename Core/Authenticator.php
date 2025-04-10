<?php

namespace Core;

use Core\Database;
use Core\Session;

class Authenticator
{
    protected $db;

    public function __construct()
    {
        $config = require base_path("config.php");
        $this->db = new Database($config['database']);
    }
    public function attempt($email, $password)
    {
        // match the credentials
        $user = $this->db->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        //if the user exist but the password provided doesnt match the one in datatabase


        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email
                ]);
                
                return true;

            }
           
        }

        return false;
    }


public function login($user){
    $_SESSION['user']=[
        'email'=>$user['email']
    ];

    session_regenerate_id(true);
}

public function logout(){
    Session::destroy();
    
}
}