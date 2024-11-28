<?php

class Receptionist extends Controller
{

   private $data = [
      'elements' => [
         'dashboard' => ["fas fa-tachometer-alt", "Dashboard"],
         'appointmentsSessions' => ["fas fa-calendar-alt", "Appointments"],
         'chat' => ["fas fa-comment-dots", "Chat"],
         'logout' => ["fas fa-sign-out-alt", "Logout"]
      ],
      'userType' => 'receptionist'
   ];

   public function index()
   {
      $this->view('Receptionist/dashboard', 'dashboard');
   }

   public function appointmentsSessions()
   {
      $this->view('Receptionist/appointmentsSessions', 'appointmentsSessions');
   }

   public function appointmentsUpcoming()
   {
      $this->view('Receptionist/appointmentsUpcoming', 'appointmentsUpcoming');
   }

   public function appointmentsPast()
   {
      $this->view('Receptionist/appointmentsPast', 'appointmentsPast');
   }

   public function appointmentQueue()
   {
      $this->view('Receptionist/appointmentQueue', 'appointmentQueue');
   }

   public function patients()
   {
      $this->view('Admin/patients', 'patients');
   }

   
   public function chat()
   {
      $this->view('Receptionist/chat', 'chat');
   }
   
   public function logout()
   {
      $this->view('Receptionist/logout', 'logout');
   }

   public function renderComponent($component, $active)
   {
      $elements = $this->data['elements'];
      $userType = $this->data['userType'];

      $filename = "../app/views/Components/{$component}.php";
      require $filename;
   }
}
