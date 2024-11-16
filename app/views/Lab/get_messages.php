<?php
session_start();
require_once("Databa.php");

if (!isset($_SESSION['userid'])) {
   echo json_encode(["status" => "error", "message" => "User not logged in."]);
   exit();
}

$sender = $_SESSION['userid'];
$receiver = $_GET['receiver'];
$DB = new Databa();

$updateSeenQuery = "UPDATE message SET seen = 1 WHERE sender = :receiver AND receiver = :sender AND seen = 0";
$DB->write($updateSeenQuery, ['receiver' => $receiver, 'sender' => $sender]);

$query = "SELECT * FROM message 
          WHERE ((sender = :sender AND receiver = :receiver AND deleted_sender = 0 AND deleted_sender != 1) 
                 OR (receiver = :sender AND sender = :receiver AND deleted_receiver = 0 AND deleted_sender != 1)) 
          ORDER BY date ASC";
$params = ['sender' => $sender, 'receiver' => $receiver];
$messages = $DB->read($query, $params);

$queryReceiver = "SELECT username FROM users WHERE id = :receiver";
$receiverData = $DB->read($queryReceiver, ['receiver' => $receiver]);
$receiverUsername = $receiverData ? $receiverData[0]['username'] : 'Unknown User';

echo json_encode([
   "status" => "success",
   "username" => $receiverUsername,
   "messages" => $messages,
]);
