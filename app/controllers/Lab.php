<?php

class Lab extends Controller
{

   private $data = [
      'elements' => [
         'dashboard' => ["fas fa-tachometer-alt", "Dashboard"],
         'requests' => ["fas fa-list", "Requests"],
         'chat' => ["fa-solid fa-comment-dots", "Chat"],
         'setting' => ["fa-solid fa-gear", "Setting"],
         'logout' => ["fas fa-sign-out-alt", "Logout"]
      ],
      'userType' => 'lab'
   ];

   public function index()
   {
      $this->view('Lab/dashboard', 'dashboard');
   }

   public function requests()
   {
      $this->view('Lab/requests', 'requests');
   }

   public function chat()
   {
      $this->view('Lab/chat', 'chat');
   }
   public function labTestDetails()
   {
      $this->view('Lab/labTestDetails', 'labTestDetails');
   }

   public function renderComponent($component, $active)
   {
      $elements = $this->data['elements'];
      $userType = $this->data['userType'];

      $filename = "../app/views/Components/{$component}.php";
      require $filename;
   }
}
