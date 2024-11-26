<?php

//user class

class User extends Model
{

    protected $table = 'user_profile';

    protected $allowedColumns = [

        'username',
        'password',
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['username'])) {
            $this->errors['username'] = "Username is required";
        } elseif (!filter_var($data['username'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['username'] = 'Username is not valid';
        }

        if (empty($data['password'])) {
            $this->errors['password'] = "Password is required";
        }


        if (empty($this->errors)) {
            return true;
        } else {
            return false;
        }
    }
}
