<?php

class Admin extends Controller
{

   private $data = [
      'elements' => [
         'dashboard' => ["fas fa-tachometer-alt", "Dashboard"],
         'appointmentsOngoing' => ["fas fa-calendar-alt", "Appointments"],
         'patients' => ["fas fa-user", "Patients"],
         'doctors' => ["fas fa-user-md", "Doctors"],
         'pharmacists' => ["fas fa-pills", "Pharmacists"],
         'labTechs' => ["fas fa-vials", "Lab Technicians"],
         'chat' => ["fas fa-comment-dots", "Chat"],
         'logout' => ["fas fa-sign-out-alt", "Logout"]
      ],
      'userType' => 'admin'
   ];

   public function index()
   {
      $this->view('Admin/dashboard', 'dashboard');
   }

   public function appointmentsOngoing()
   {
      $this->view('Admin/appointmentsOngoing', 'appointmentsOngoing');
   }

   public function appointmentsUpcoming()
   {
      $this->view('Admin/appointmentsUpcoming', 'appointmentsUpcoming');
   }

   public function appointmentsPast()
   {
      $this->view('Admin/appointmentsPast', 'appointmentsPast');
   }

   public function patients()
   {
      $this->view('Admin/patients', 'patients');
   }

   public function patientForm1()
   {
      $this->view('Admin/patientForm1', 'patientForm1');
   }

   public function patientForm2()
   {
      $this->view('Admin/patientForm2', 'patientForm2');
   }

   public function doctors()
   {
      $doctor = new Doctor(); // Instantiate the Doctor model
      $data['doctors'] = $doctor->getAllDoctors(); // Fetch all doctor data, including ID
      $this->view('Admin/doctors', 'doctors', $data); // Pass the data to the view
   }

   // public function doctorForm1()
   // {
   //    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   //       $_SESSION['doctor_data'] = $_POST; // Temporarily store form data in session
   //       header('Location: ' . ROOT . '/Admin/doctorForm2');
   //       exit;
   //   }
 
   //   $this->view('Admin/doctorForm1', 'doctorForm1');
   // }

   public function doctorForm1()
   {
      $data = [];

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $doctor = new Doctor();
         $doctorData = $_POST;

         // Validate step 1 fields
         if ($doctor->validate($doctorData, 1)) {
            // Temporarily store validated data in session
            $_SESSION['doctor_data'] = $doctorData;
            header('Location: ' . ROOT . '/Admin/doctorForm2');
            exit;
         } 
         else {
            // Add validation errors to data array
            $data['errors'] = $doctor->getErrors();
            $data['formData'] = $doctorData; // Pass submitted data back to the view
         }
      }

      $this->view('Admin/doctorForm1', 'doctorForm1', $data ?? []);
   }

   public function doctorForm2()
   {
      $data = [];

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $doctor = new Doctor();

         // Merge previously stored data with current data
         $doctorData = array_merge($_SESSION['doctor_data'] ?? [], $_POST);

         // Validate step 2 fields
         if ($doctor->validate($doctorData, 2)) {
               // Add doctor to the database
               if ($doctor->addDoctor($doctorData)) {
                  echo "<script>
                        alert('Doctor Profile Created Successfully!');
                        window.location.href = '" . ROOT . "/Admin/doctors';
                  </script>";
                  unset($_SESSION['doctor_data']); // Clear session data
                  exit;
               } else {
                  echo "<script>alert('Database insertion failed.');</script>";
               }
         } else {
               // // Show all validation errors as alerts
               // foreach ($doctor->getErrors() as $error) {
               // echo "<script>alert('$error');</script>";

               // Add validation errors to data array
               $data['errors'] = $doctor->getErrors();
               $data['formData'] = $doctorData; // Pass submitted data back to the view
         }   
      }

      $this->view('Admin/doctorForm2', 'doctorForm2', $data ?? []);
   }


   // public function doctorForm2()
   // {
   //    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   //       $doctorData = array_merge($_SESSION['doctor_data'] ?? [], $_POST);

   //       // // Debug: Print or log the merged doctor data
   //       // echo 'Form2 Data';
   //       // echo '<pre>';
   //       // print_r($doctorData);
   //       // echo '</pre>';
 
   //       $doctor = new Doctor();
 
   //       if ($doctor->validate($doctorData)) {
   //          if ($doctor->addDoctor($doctorData)) {
   //             echo "<script>
   //                    alert('Doctor Profile Created Successfully!');
   //                    window.location.href = '" . ROOT . "/Admin/doctors';
   //             </script>";
   //             exit; // Ensure the script stops execution
              
   //             unset($_SESSION['doctor_data']); // Clear session data after success     
   //          } else {
   //             echo "<script>alert('Database insertion failed.');</script>";
   //          }
   //       } 
   //       else {
   //          // Show all validation errors as alerts
   //          foreach ($doctor->getErrors() as $error) {
   //              echo "<script>alert('$error');</script>";
   //          }
   //       }
   //   }
 
   //    $this->view('Admin/doctorForm2', 'doctorForm2', $data ?? []);
   // }

   public function pharmacists()
   {
      $this->view('Admin/pharmacists', 'pharmacists');
   }

   public function pharmacistForm1()
   {
      $this->view('Admin/pharmacistForm1', 'pharmacistForm1');
   }

   public function pharmacistForm2()
   {
      $this->view('Admin/pharmacistForm2', 'pharmacistForm2');
   }

   public function labTechs()
   {
      $this->view('Admin/labTechs', 'labTechs');
   }

   public function labTechForm1()
   {
      $this->view('Admin/labTechForm1', 'labTechForm1');
   }

   public function labTechForm2()
   {
      $this->view('Admin/labTechForm2', 'labTechForm2');
   }

   public function chat()
   {
      $this->view('Admin/chat', 'chat');
   }
   
   public function logout()
   {
      $this->view('Admin/logout', 'logout');
   }

   public function renderComponent($component, $active)
   {
      $elements = $this->data['elements'];
      $userType = $this->data['userType'];

      $filename = "../app/views/Components/{$component}.php";
      require $filename;
   }
}
