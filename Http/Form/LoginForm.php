<?php

namespace Http\Form;

use Core\ValidationException;

class LoginForm
{

    protected $errors = [];


    
    public function __construct(public array $attribute)
    {
       
        
        // Now you can safely access $this->attribute
        // Check if email is empty
        if (!isset($attribute['email']) || trim($attribute['email']) === '') {
            $this->errors['email'] = 'Please provide a valid email.';
        } elseif (!filter_var($attribute['email'], FILTER_VALIDATE_EMAIL)) {
            // Check if the email is in a valid format
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        // Check if password is empty
        if (!isset($attribute['password']) || trim($attribute['password']) === '') {
            $this->errors['password'] = 'Please provide a valid password.';
        } elseif (strlen($attribute['password']) < 6) {
            // Check if password is at least 6 characters
            $this->errors['password'] = 'Password must be at least 6 characters long.';
        }
    }   

    public static function validate($attribute)
    {
        
        $instance=new static($attribute);

        if($instance->failed()){
            ValidationException::throw($instance->errors(),$instance->$attribute);
        }

        return $instance;
        
    }

    public function failed(){
        return count($this->errors);

    }

    public function errors(){
        return ($this->errors);
    }

    public function error($field,$message){
        $this->errors[$field]=$message;
    }
}
