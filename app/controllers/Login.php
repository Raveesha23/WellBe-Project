<?php

class Login extends Controller {

    public function index() {
        $data = [];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($_SESSION['user_type'] == "patient") {
                $user = new Patient;
            } elseif ($_SESSION['user_type'] == "doctor") {
                $user = new Doctor;
            }

            $arr['nic'] = $_POST['nic'];
            $row = $user->first($arr);

            if ($row) {
                if ($row->password === $_POST['password']) {
                    $_SESSION['USER'] = $row; // Save user details in the session
                    redirect($_SESSION['user_type']);
                } else {
                    $user->errors['password'] = 'Wrong password'; // Add specific error for wrong password
                }
            } else {
                $user->errors['nic'] = 'NIC not found';
            }

            // Pass the errors to the view
            $data['errors'] = $user->errors;
        }

        $this->view('login', $data);
    }
}
