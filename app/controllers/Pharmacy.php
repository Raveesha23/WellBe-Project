<?php

class Pharmacy extends Controller
{

   private $data = [
      'elements' => [
         'dashboard' => ["fas fa-tachometer-alt", "Dashboard"],
         'requests' => ["fas fa-list", "Requests"],
         'chat' => ["fa-solid fa-comment-dots", "Chat"],
         'setting' => ["fa-solid fa-gear", "Setting"],
         'logout' => ["fas fa-sign-out-alt", "Logout"]
      ],
      'userType' => 'pharmacy'
   ];

   public function index()
   {
      $this->view('Pharmacy/dashboard', 'dashboard');
   }

   public function requests()
   {
      $this->view('Pharmacy/requests', 'requests');
   }

   public function chat()
   {
      $this->view('Pharmacy/chat', 'chat');
   }

   public function medicationDetails()
   {
      $this->view('Pharmacy/medicationDetails', 'medicationDetails');
   }


   public function renderComponent($component, $active)
   {
      $elements = $this->data['elements'];
      $userType = $this->data['userType'];

      $filename = "../app/views/Components/{$component}.php";
      require $filename;
   }
}
