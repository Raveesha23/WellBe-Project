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
      $this->view('Admin/doctors', 'doctors');
   }

   public function doctorForm1()
   {
      $this->view('Admin/doctorForm1', 'doctorForm1');
   }

   public function doctorForm2()
   {
      $this->view('Admin/doctorForm2', 'doctorForm2');
   }

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
