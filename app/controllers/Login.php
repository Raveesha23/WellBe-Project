<?php

class Login extends Controller
{

    public function index()
    {
        $data = [];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['nic'])){

                $id = $_POST['nic'];
            
                // Check if 'd' exists in the string
                if (strpos($id, 'd') !== false) {
                    $_SESSION['user_type'] = "doctor";
                    echo "'d' exists in the ID.";
                    $user = new Doctor;
                }
                elseif (strpos($id, 'p') !== false) {
                    $user = new Patient;
                    $_SESSION['user_type'] = "patient";
                }
                elseif (strpos($id, 'ph') !== false) {
                    $user = new Pharmacy;
                    $_SESSION['user_type'] = "pharmacy";
                }
                elseif (strpos($id, 'l') !== false) {
                    $user = new Lab;
                    $_SESSION['user_type'] = "lab";
                }
                elseif (strpos($id, 'a') !== false) {
                    $user = new Admin;
                    $_SESSION['user_type'] = "admin";
                }

            
                //password_verify($_POST['password'], $row->password
                $arr['nic'] = $_POST['nic'];
                $row = $user->first($arr);

                if ($row) {
                    if (password_verify($_POST['password'], $row->password)) {
                        $_SESSION['USER'] = $row; // Save user details in the session
                        //session_start();
                        redirect($_SESSION['user_type']);
                    } else {
                        $user->errors['password'] = 'Wrong password'; // Add specific error for wrong password
                        redirect('login');
                    }
                } else {
                    $user->errors['nic'] = 'NIC not found';
                    redirect('login');
                }

                $data['errors'] = $user->errors;
            }

        }

        $this->view('login', $data);
    }
}
