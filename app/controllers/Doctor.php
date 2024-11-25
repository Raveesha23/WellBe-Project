<?php

    class Doctor extends Controller{

        private $data = [
            'elements' => [
                'dashboard' => ["fas fa-tachometer-alt", "Dashboard"],
                'appointments' => ["fas fa-calendar-alt", "Appointments"],
                'today_checkups' => ["fas fa-user", "Today-checkups"],
                'chat' => ["fa-solid fa-comment-dots", "Chat"],
                'logout' => ["fas fa-sign-out-alt", "Logout"]
            ],
            'userType' => 'doctor'
        ];

        public function index(){
            $this->view('Doctor/dashboard','dashboard');
        }

        public function today_checkups(){
            $this->view('Doctor/today-checkups','today-checkups');
        }

        public function appointments(){
            $this->view('Doctor/appointments','appointments');
        }

        public function medication_Details(){

            $this->view('Doctor/medication_Details','dashboard');
        }

        public function chat()
        {
            $this->view('Doctor/chat', 'chat');
        }

        public function renderComponent($component,$active)
        {
            $elements = $this->data['elements'];
            $userType = $this->data['userType'];

            $filename = "../app/views/Components/{$component}.php";
            require $filename;
        }

        public function renderCalender($component)
        {

            $timeslot = new Timeslot;
            $_SESSION['schedule'] = $timeslot -> getSchedule();

            $filename = "../app/views/Components/{$component}.php";
            require $filename;
        }

        public function renderChart($component)
        {
            $filename = "../app/views/Components/Doctor/{$component}.php";
            require $filename;
        }
    }