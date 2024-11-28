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
<<<<<<< HEAD
        } elseif (!filter_var($data['username'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['username'] = 'Username is not valid';
=======
>>>>>>> b6af62eac9dd3f336fdb2e84d1ebe651ffdafe6b
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
