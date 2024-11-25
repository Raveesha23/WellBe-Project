<?php

//user class
class Doctor extends Model
{

    protected $table = 'doctor';

    protected $allowedColumns = [

        'nic',
        'first_name',
        'last_name',
        'dob',
        'age',
        'gender',
        'address',
        'email',
        'contact',
        'emergency_contact',
        'emergency_contact_relationship',
        'medical_license_no',
        'specialization',
        'experience',
        'qualifications',
        'medical_school',
    ];

    public function addDoctor($data)
    {
        $query = "
            INSERT INTO `doctor` 
            (`nic`, `first_name`, `last_name`, `dob`, `age`, `gender`, `address`, `email`, `contact`, `emergency_contact`, `emergency_contact_relationship`, `medical_license_no`, `specialization`, `experience`, `qualifications`, `medical_school`) 
            VALUES 
            (:nic, :first_name, :last_name, :dob, :age, :gender, :address, :email, :contact, :emergency_contact, :emergency_contact_relationship, :medical_license_no, :specialization, :experience, :qualifications, :medical_school)
        ";

        $this->db->query($query);

        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':dob', $data['dob']);
        $this->db->bind(':age', $this->calculateAge($data['dob']));
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':contact', $data['contact']);
        $this->db->bind(':emergency_contact', $data['emergency_contact']);
        $this->db->bind(':emergency_contact_relationship', $data['emergency_contact_relationship']);
        $this->db->bind(':medical_license_no', $data['medical_license']);
        $this->db->bind(':specialization', $data['specialization']);
        $this->db->bind(':experience', $data['experience']);
        $this->db->bind(':qualifications', $data['qualifications']);
        $this->db->bind(':medical_school', $data['medical_school']);

        return $this->db->execute();
    }

    private function calculateAge($dob)
    {
        $dobDate = new DateTime($dob);
        $currentDate = new DateTime();
        return $dobDate->diff($currentDate)->y;
    }


    public function validate($doctorData)
    {
        $this->errors = [];

        if (empty($doctorData['nic']) || 
            empty($doctorData['first_name']) || 
            empty($doctorData['last_name']) || 
            empty($doctorData['dob']) ||  
            empty($doctorData['gender']) ||
            empty($doctorData['address']) ||
            empty($doctorData['email']) || 
            empty($doctorData['contact']) ||
            empty($doctorData['emergency_contact']) ||
            empty($doctorData['medical_license_no']) ||
            empty($doctorData['specialization']) ||
            empty($doctorData['experience']) ||
            empty($doctorData['qualifications_certifications']) ||
            empty($doctorData['medical_school']) ) {

                $this->errors[] = 'Please fill in all required fields.';

        } 

        // Validate NIC format (example: 10 digits or format check)
        if (!preg_match('/^\d{10}$/', $doctorData['nic'])) {
            $this->errors[] = 'Invalid NIC format. It must be 10 digits.';
        }


            
            // Validate email format
        if (!filter_var($doctorData['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = 'Invalid email address.';
        }

        // Validate contact number (example: 10 digits)
        if (!preg_match('/^\d{10}$/', $doctorData['contact'])) {
            $this->errors[] = 'Invalid contact number. It must be 10 digits.';
        }

        // Validate emergency contact number (example: 10 digits)
        if (!preg_match('/^\d{10}$/', $doctorData['emergency_contact'])) {
            $this->errors[] = 'Invalid emergency contact number. It must be 10 digits.';
        }

        // Validate date of birth (ensure it's a valid past date)
        $dob = strtotime($doctorData['dob']);
        if (!$dob || $dob >= time()) {
            $this->errors[] = 'Invalid date of birth. Please select a valid past date.';
        }

        // Validate years of experience as a positive integer
        if (!is_numeric($doctorData['experience']) || $doctorData['experience'] < 0) {
            $this->errors[] = 'Years of experience must be a positive number.';
        }

        // Return true if no errors, false otherwise
        return empty($this->errors);

    }

    // public function addDoctor($doctorData)
    // {
    //     if ($this->validate($doctorData)) {
    //         // Call the parent insert method to save data
    //         return $this->insert ($doctorData);
    //     }

    //     return false;
    // }

    public function getErrors()
    {
        return $this->errors;
    }


        // if(empty($this->errors))
        // {
        //     return true;
        // }else
        // {
        //     return false;
        // }
}
