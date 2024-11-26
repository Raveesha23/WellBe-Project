<?php

//user class

class Timeslot extends Model
{

    public function getSchedule(){

        /*$query = "SELECT date,
        JSON_EXTRACT(doctor_timeslot, '$.{$_SESSION['USER']->id}') AS timeslots
        FROM timeslot
        WHERE JSON_CONTAINS_PATH(doctor_timeslot, 'one', '$.{$_SESSION['USER']->id}');";*/

        $query = "
                    SELECT 
                        t.date,
                        td.start_time AS start,
                        td.end_time AS end
                    FROM 
                        timeslot t
                    JOIN 
                        timeslot_doctor td ON t.slot_id = td.slot_id
                    JOIN 
                        doctor d ON td.doctor_id = d.id
                    WHERE 
                        d.id = '{$_SESSION['USER']->id}'
                    ORDER BY 
                        t.date, td.start_time;";


		$schedule =  $this->query($query);

        //echo "<pre>";  // Optional: Format output for readability
		//print_r($schedule);  // Displays array structure
		//echo "</pre>";

        return $schedule;
    }

    public function updateSchedule($date,$timeslot){

        $id = $_SESSION['USER']->id;

        $timeSlots = explode(',', $timeslot);
        
        $query = "INSERT INTO timeslot_doctor (slot_id, doctor_id, start_time, end_time)
                    VALUES (
                        (SELECT slot_id FROM timeslot WHERE date = '$date'), 
                        '{$_SESSION['USER']->id}', 
                        '$timeSlots[0]', 
                        '$timeSlots[1]'
                    );";

        $this->query($query);

        redirect("doctor");
    }

    public function deleteDate($date){

        $query = "DELETE td
              FROM timeslot_doctor td
              JOIN timeslot ts ON td.slot_id = ts.slot_id
              WHERE ts.date = '$date' 
                AND td.doctor_id = '{$_SESSION['USER']->id}'";

        $this->query($query);
        redirect("doctor");
    }
}