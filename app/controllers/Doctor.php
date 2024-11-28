<?php

class Doctor extends Controller
{

<<<<<<< HEAD
    private $data = [
        'elements' => [
            'dashboard' => ["fas fa-tachometer-alt", "Dashboard"],
            'appointments' => ["fas fa-calendar-alt", "Appointments"],
            'patients' => ["fas fa-user", "Patients"],
            'chat' => ["fa-regular fa-message", "Chat"],
            'logout' => ["fas fa-sign-out-alt", "Logout"]
        ],
        'userType' => 'doctor'
    ];
=======
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
>>>>>>> b6af62eac9dd3f336fdb2e84d1ebe651ffdafe6b

    public function index()
    {
        $this->view('Doctor/dashboard', 'dashboard');
    }

<<<<<<< HEAD
    public function patientQueue()
    {
        $this->view('Doctor/patientQueue', 'dashboard');
    }
=======
        public function today_checkups(){
            $this->view('Doctor/today-checkups','today-checkups');
        }
>>>>>>> b6af62eac9dd3f336fdb2e84d1ebe651ffdafe6b

    public function appointments()
    {
        $this->view('Doctor/appointments', 'appointments');
    }
    public function chat()
    {
        $this->view('Doctor/chat', 'chat');
    }

<<<<<<< HEAD
    public function renderComponent($component, $active)
    {
        $elements = $this->data['elements'];
        $userType = $this->data['userType'];

        $filename = "../app/views/Components/{$component}.php";
        require $filename;
    }
}
=======
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
>>>>>>> b6af62eac9dd3f336fdb2e84d1ebe651ffdafe6b
