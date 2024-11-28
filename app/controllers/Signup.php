<?php

class Signup extends Controller
{
    public function index()
    {
        $data = [];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Save the data from the first form to the session
            $_SESSION['form1_data'] = $_POST;

            // Redirect to the second form
            redirect("signup/form2");
        }

        $this->view('patientForm1', $data);
    }

    public function form2()
    {
        $data = [];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Merge form1 data with form2 data
            $fullData = array_merge($_SESSION['form1_data'] ?? [], $_POST);

            // Clear session data after merging
            unset($_SESSION['form1_data']);

            if ($_SESSION['user_type'] == "patient") {
                $user = new Patient;
            }

            if ($user->validate($fullData)) {
                $user->insert($fullData);
                echo "User ID: " . $fullData['nic'];
                redirect("login");
            } else {
                echo "<pre>";
                print_r($user->errors);
                echo "</pre>";
                die();
            }

            // If validation fails, pass errors to the view
            $data['errors'] = $user->errors;
        }

        $this->view('patientForm2', $data);
    }
}
