<?php
// Include the Database class
include_once(__DIR__ . '/../../core/Database.php');
include_once(__DIR__ . '/../../models/Doctor.php');

// Create a new instance of the Doctor model
$doctorModel = new Doctor();

// Get the request parameters
$doctor = isset($_POST['doctor']) ? $_POST['doctor'] : null;
$specialization = isset($_POST['specialization']) ? $_POST['specialization'] : null;

if ($doctor) {
    // Fetch specialization(s) based on doctor
    $specializations = $doctorModel->searchByName($doctor);

    // Convert results to a JSON array
    $result = [];
    if ($specializations) {
        foreach ($specializations as $row) {
            $result[] = $row->specialization;
        }
    }

    echo json_encode($result);

} elseif ($specialization) {
    // Fetch doctor(s) based on specialization
    $doctors = $doctorModel->searchBySpecialization($specialization);

    // Convert results to a JSON array
    $result = [];
    if ($doctors) {
        foreach ($doctors as $row) {
            $result[] = $row->first_name;
        }
    }

    echo json_encode($result);

} else {
    // Default case: Fetch all doctors and specializations
    $data = $doctorModel->findAll();

    // Convert results to a JSON array
    $result = [];
    if ($data) {
        foreach ($data as $row) {
            $result[] = [
                'first_name' => $row->first_name,
                'specialization' => $row->specialization,
            ];
        }
    }

    echo json_encode($result);
}
