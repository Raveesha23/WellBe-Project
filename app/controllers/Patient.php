<?php

class Patient extends Controller
{

   private $data = [
      'elements' => [
         'dashboard' => ["fas fa-tachometer-alt", "Dashboard"],
         'view_medical_reports' => ["fas fa-calendar-alt", "View Medical Reports"],
         'view_lab_reports' => ["fas fa-user", "View Lab Reports"],
         'search_for_doctor' => ["fas fa-user-md", "Search for a Doctor"],
         'appointments' => ["fas fa-pills", "Appointments"],
         'chat_with_the_doctor' => ["fas fa-vials", "Chat with the Doctor"],
         'settings' => ["fas fa-cogs", "Settings"],
         'logout' => ["fas fa-sign-out-alt", "Logout"]
      ],
      'userType' => 'patient'
   ];

   public function index()
   {
      $this->view('Patient/dashboard', 'dashboard');
   }

   public function view_medical_reports()
   {
      $this->view('Patient/view_medical_reports', 'view_medical_reports');
   }

   public function view_lab_reports()
   {
      $this->view('Patient/view_lab_reports', 'view_lab_reports');
   }
   public function search_for_doctor()
   {
      $this->view('Patient/search_for_doctor', 'search_for_doctor');
   }
   public function appointments()
   {
      $this->view('Patient/appointments', 'appointments');
   }
   public function chat_with_the_doctor()
   {
      $this->view('Patient/chat_with_the_doctor', 'chat_with_the_doctor');
   }
   public function settings()
   {
      $this->view('Patient/settings', 'settings');
   }
   public function logout()
   {
      $this->view('Patient/logout', 'logout');
   }



   public function renderComponent($component, $active)
   {
      $elements = $this->data['elements'];
      $userType = $this->data['userType'];

      $filename = "../app/views/Components/{$component}.php";
      require $filename;
   }
}
