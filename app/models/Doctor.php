<?php

class Doctor extends Model
{

    protected $table = 'doctor';

    protected $allowedColumns = [

        'id',
        'password',
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
        // Calculate the age based on the date of birth
        $data['age'] = $this->calculateAge($data['dob']);
        $doc_pw = 'doc123';

        // Build the SQL query using the provided data
        $query = "
            INSERT INTO `doctor` 
            (`id`, `nic`, `password`, `first_name`, `last_name`, `dob`, `age`, `gender`, `address`, `email`, `contact`, `emergency_contact`, `emergency_contact_relationship`, `medical_license_no`, `specialization`, `experience`, `qualifications`, `medical_school`) 
            VALUES (
                '{$data['nic']}', 
                '{$data['nic']}',
                '{$doc_pw}', 
                '{$data['first_name']}', 
                '{$data['last_name']}', 
                '{$data['dob']}', 
                '{$data['age']}', 
                '{$data['gender']}', 
                '{$data['address']}', 
                '{$data['email']}', 
                '{$data['contact']}', 
                '{$data['emergency_contact']}', 
                '{$data['emergency_contact_relationship']}', 
                '{$data['medical_license_no']}', 
                '{$data['specialization']}', 
                '{$data['experience']}', 
                '{$data['qualifications']}', 
                '{$data['medical_school']}'
            )
        ";

        // Debug the query
        //echo "Generated Query: <pre>$query</pre>";

        // Execute the query
        return $this->query($query);
    }

    private function calculateAge($dob)
    {
        $dobDate = new DateTime($dob);
        $currentDate = new DateTime();
        return $dobDate->diff($currentDate)->y;
    }

    public function validate($doctorData, $step = 1)
    {
        $this->errors = [];

        if ($step === 1) {
            // Required fields for doctorForm1
            $requiredFields = [
                'nic', 'first_name', 'last_name', 'dob', 
                'address', 'email', 'contact', 'emergency_contact', 
                'emergency_contact_relationship'
            ];
        } else {
            // Required fields for doctorForm2
            $requiredFields = [
                'medical_license_no', 'specialization', 
                'experience', 'qualifications', 'medical_school'
            ];
        }
        if (empty($data['nic'])) {
            $this->errors['nic'] = "Username is required";
        }

        if (empty($data['password'])) {
            $this->errors['password'] = "Password is required";
        }


        if (empty($this->errors)) {
            return true;
        } else {
            return false;

        // Step-specific validations
        if ($step === 1) {
            // Validate NIC format (12 digits)
            if (!empty($doctorData['nic']) && !preg_match('/^\d{12}$/', $doctorData['nic'])) {
                $this->errors[] = 'Invalid NIC format. It must be 12 digits.';
            }

            // Validate email format manually
            if (!empty($doctorData['email']) && !preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $doctorData['email'])) {
                $this->errors[] = 'Invalid email address.';
            }


            // Validate contact number (10 digits)
            if (!empty($doctorData['contact']) && !preg_match('/^\d{10}$/', $doctorData['contact'])) {
                $this->errors[] = 'Invalid contact number. It must be 10 digits.';
            }

            // Validate emergency contact number (10 digits)
            if (!empty($doctorData['emergency_contact']) && !preg_match('/^\d{10}$/', $doctorData['emergency_contact'])) {
                $this->errors[] = 'Invalid emergency contact number. It must be 10 digits.';
            }

            // Validate date of birth (must be a past date)
            if (!empty($doctorData['dob'])) {
                $dob = strtotime($doctorData['dob']);
                if (!$dob || $dob >= time()) {
                    $this->errors[] = 'Invalid date of birth. Please select a valid past date.';
                }
            }
        }

        if ($step === 2) {
            // Validate years of experience as a positive integer
            if (!empty($doctorData['experience']) && (!is_numeric($doctorData['experience']) || $doctorData['experience'] < 0)) {
                $this->errors[] = 'Years of experience must be a positive number.';
        }

        if (empty($data['password'])) {
            $this->errors['password'] = "Password is required";
        }


        if (empty($this->errors)) {
            return true;
        } else {
            return false;
        }


        // Validate contact number (10 digits)
        if (!empty($doctorData['contact']) && !preg_match('/^\d{10}$/', $doctorData['contact'])) {
            $this->errors[] = 'Invalid contact number. It must be 10 digits.';
        }

        // Validate emergency contact number (10 digits)
        if (!empty($doctorData['emergency_contact']) && !preg_match('/^\d{10}$/', $doctorData['emergency_contact'])) {
            $this->errors[] = 'Invalid emergency contact number. It must be 10 digits.';
        }

        // Validate date of birth (must be a past date)
        if (!empty($doctorData['dob'])) {
            $dob = strtotime($doctorData['dob']);
            if (!$dob || $dob >= time()) {
                $this->errors[] = 'Invalid date of birth. Please select a valid past date.';
            }
        }

        // Validate years of experience as a positive integer
        if (!empty($doctorData['experience']) && (!is_numeric($doctorData['experience']) || $doctorData['experience'] < 0)) {
            $this->errors[] = 'Years of experience must be a positive number.';
        }

        // Return true if no errors, false otherwise
        return empty($this->errors);
    }

    public function loggedin()
    {
        $DB = new Database();
        // Update user state to 1 (logged in)
        $updateStateQuery = "UPDATE user_profile SET state = 1 WHERE id = :userid";
        $DB->write($updateStateQuery, ['userid' => $_SESSION['userid']]);

        // Update messages as received
        $updateQuery = "UPDATE message SET received = 1 WHERE receiver = :receiver AND received = 0";
        $DB->write($updateQuery, ['receiver' => $_SESSION['userid']]);
    }
}
    
