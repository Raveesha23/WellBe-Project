<?php
include_once(__DIR__ . '/../../core/Database.php');
include_once(__DIR__ . '/../../models/Doctor.php');
include_once(__DIR__ . '/../../models/Slot.php');

$db = new Database();
$doctorModel = new Doctor();
$slotModel = new Slot();

$doctor = isset($_POST['doctor']) ? $_POST['doctor'] : null;

if ($doctor) {
    // Fetch available time slots for the selected doctor
    $timeSlots = $slotModel->getAvailableSlotsForDoctor($doctor);

    $formattedSlots = [];
    if ($timeSlots) {
        foreach ($timeSlots as $row) {
            $dateTime = new DateTime($row->date);
            $formattedDate = $dateTime->format('Y-m-d');
            $formattedTime = $dateTime->format('h:i A'); // 12-hour format with AM/PM
            $formattedSlots[] = [
                'date' => $formattedDate,
                'time' => $formattedTime
            ];
        }
    }

    echo json_encode($formattedSlots);
    exit;
} else {
    echo json_encode([]);
    exit;
}
