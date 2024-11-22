<?php

//user class

class Timeslot extends Model
{

    public function getSchedule(){

        $query = "SELECT date,
        JSON_EXTRACT(doctor_timeslot, '$.{$_SESSION['USER']->id}') AS timeslots
        FROM timeslot
        WHERE JSON_CONTAINS_PATH(doctor_timeslot, 'one', '$.{$_SESSION['USER']->id}');";

		$schedule =  $this->query($query);

        //echo "<pre>";  // Optional: Format output for readability
		//print_r($schedule);  // Displays array structure
		//echo "</pre>";

        return $schedule;
    }

    public function updateSchedule($date,$timeslot){

        $id = $_SESSION['USER']->id;

        if (is_string($timeslot)) {
            $timeslotArray = explode(",", $timeslot); // Convert string to array
        }
        
        $json_Array = [];

        foreach ($timeslotArray as $key => $value) {
            $parts = explode("-", $value);
            echo $parts[0];
            $JSON_ARRAY[] = "JSON_OBJECT('start', '{$parts[0]}', 'end', '{$parts[1]}')";
        }

        //print_r($json_Array);

        // Step 2: Convert the array into a valid JSON string for SQL
        $jsonArrayString = implode(",", $JSON_ARRAY);
        

        $query = "UPDATE timeslot
        SET doctor_timeslot = JSON_SET(
            doctor_timeslot,
            '$.\"{$id}\"', 
            JSON_ARRAY($jsonArrayString)
        )
        WHERE date = '$date';";

        $this->query($query);
    }
}