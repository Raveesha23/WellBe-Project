<?php

class signup extends Controller{

    public function index(){

        $data=[];

        if($_SERVER['REQUEST_METHOD'] == "POST"){
         
            $user = new User;
            if($user->validate($_POST))
            {
                $user->insert($_POST);
                echo $_POST['username'];
                redirect("login");
            }

            $data['errors'] = $user->errors;
        }

        $this->view('signup' ,$data);
    }
}