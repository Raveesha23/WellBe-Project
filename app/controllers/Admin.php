<?php

class Admin extends Controller
{

   private $data = [
      'elements' => [
         'dashboard' => ["fas fa-tachometer-alt", "Dashboard"],
         'appointments' => ["fas fa-calendar-alt", "Appointments"],
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

   public function appointments()
   {
      $this->view('Admin/appointments', 'appointments');
   }

   public function patients()
   {
      $this->view('Admin/patients', 'patients');
   }
   public function doctors()
   {
      $this->view('Admin/doctors', 'doctors');
   }
   public function pharmacists()
   {
      $this->view('Admin/pharmacists', 'pharmacists');
   }
   public function labTechs()
   {
      $this->view('Admin/labTechs', 'labTechs');
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
