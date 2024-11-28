<?php

class MedicalRecord extends Model {

    public function insertRecord($remarks) {
        $doctor_id = $_SESSION['USER']->id;
        $patient_id = 0;
        $state = "new";

        $query = "INSERT INTO medication_requests (doctor_id, patient_id, date, time, remark, state)
                  VALUES (?, ?, CURDATE(), CURTIME(), ?, ?)";

        $this->query($query, [$doctor_id, $patient_id, $remarks, $state]);

    }

    public function getLastInsertedId() {
        $query = "SELECT LAST_INSERT_ID() AS id";
        $result = $this->query($query); // Assuming `query()` returns the result set
        echo print_r($result);
        echo $result[0]->id;
    }

}