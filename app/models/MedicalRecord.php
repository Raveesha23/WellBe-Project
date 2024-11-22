<?php

class MedicalRecord extends Model{

    public function insertRecord($data){

        $doctor_id = 202;
        $patient_id = 111;
        $date = '2024-11-19';

        $query = "INSERT INTO medical_record (doctor_id,patient_id,record,date) VALUES (?,?,?,?)";

        $this->query($query,[$doctor_id,$patient_id,$data,$date]);
    }
}