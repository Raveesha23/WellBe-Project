<?php

class Login extends Controller{

    public function index(){

        $data = [];

        if($_SERVER['REQUEST_METHOD'] == "POST"){
         
            $user = new User;
            
            $arr['username'] = $_POST['username'];
            $row = $user->first($arr);

            if($row)
            {
                if($row->password === $_POST['password'])
                {
                    $_SESSION['USER'] = $row; //for save user details until end of the session
                    redirect("home");
                }
            }
            $user->errors['username'] = 'Wrong username or password';
            $data['errors'] = $user->errors;
        }

        echo $_SESSION['user_type'];

        $this->view('login',$data);
    }
}