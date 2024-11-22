<?php


//user class

class Doctor extends Model
{

    protected $table = 'doctor';

    protected $allowedColumns = [

        'id',
        'password',
    ];

    public function validate($data)
    {
        $this->errors = [];

        if(empty($data['id']))
        {
            $this->errors['id'] = "Username is required";
        }

        if(empty($data['password']))
        {
            $this->errors['password'] = "Password is required";
        }
        

        if(empty($this->errors))
        {
            return true;
        }else
        {
            return false;
        }
    }
}