<?php
// app/models/Chat.php

require_once __DIR__ . '/../core/model.php';

class Chat extends Model
{

   protected $table = 'message';

   // public function __construct()
   // {
   //    parent::__construct();
   // }

   // Delete message (sender or receiver)
   public function deleteMessage($messageId, $isSender)
   {
      $currentUserId = $_SESSION['userid'];
      $query = $isSender
         ? "UPDATE message SET deleted_sender = 1 WHERE id = :messageId AND sender = :currentUserId"
         : "UPDATE message SET deleted_receiver = 1 WHERE id = :messageId AND receiver = :currentUserId";

      return $this->write($query, ['messageId' => $messageId, 'currentUserId' => $currentUserId]);
   }

   // Get the last message date between the current user and other users
   public function getLastMessageDates()
   {
      $currentUserId = $_SESSION['userid'];
      $query = "SELECT users.id, 
                          DATE_FORMAT((SELECT date FROM message 
                                       WHERE (sender = users.id AND receiver = :currentUserId) 
                                       OR (sender = :currentUserId AND receiver = users.id) 
                                       ORDER BY date DESC LIMIT 1), '%d/%m/%Y') AS date
                   FROM users
                   WHERE users.id != :currentUserId";
      return $this->query($query, ['currentUserId' => $currentUserId]);
   }

   // Get messages between two users
   public function getMessages($receiver)
   {
      $sender = $_SESSION['userid'];
      $updateSeenQuery = "UPDATE message SET seen = 1 WHERE sender = :receiver AND receiver = :sender AND seen = 0";
      $this->query($updateSeenQuery, ['receiver' => $receiver, 'sender' => $sender]);

      $query = "SELECT * FROM message 
             WHERE ((sender = :sender AND receiver = :receiver AND deleted_sender = 0) 
                   OR (receiver = :sender AND sender = :receiver AND deleted_receiver = 0)) 
             ORDER BY date ASC";
      return $this->readn($query, ['sender' => $sender, 'receiver' => $receiver]);
   }

   // Get the username of the receiver
   public function getReceiverUsername($receiver)
   {
      $query = "SELECT username FROM users WHERE id = :receiver";
      $receiverData = $this->query($query, ['receiver' => $receiver]);
      return $receiverData ? $receiverData[0]->username : 'Unknown User';
   }

   // Get the count of unseen messages for all users
   public function getUnseenCounts()
   {
      $currentUserId = $_SESSION['userid'];
      $query = "SELECT users.*, 
      (SELECT seen FROM message 
       WHERE (sender = users.id AND receiver = :currentUserId) 
       OR (sender = :currentUserId AND receiver = users.id) 
       ORDER BY date DESC LIMIT 1) AS seen,
      (SELECT date FROM message 
       WHERE (sender = users.id AND receiver = :currentUserId) 
       OR (sender = :currentUserId AND receiver = users.id) 
       ORDER BY date DESC LIMIT 1) AS last_message_date,
      (SELECT COUNT(*) FROM message 
       WHERE sender = users.id AND receiver = :currentUserId AND seen = 0) AS unseen_count
      FROM users
      WHERE users.id != :currentUserId
      ORDER BY 
         unseen_count DESC,  -- Users with unseen messages come first
         last_message_date DESC";
      return $this->query($query, ['currentUserId' => $currentUserId]);
   }

   // Get the status of all users
   public function getUserStatuses()
   {
      $currentUserId = $_SESSION['userid'];
      $query = "SELECT users.id, users.state FROM users WHERE users.id != :currentUserId";
      return $this->query($query, ['currentUserId' => $currentUserId]);
   }

   // Mark messages as seen
   public function markMessagesSeen($receiver)
   {
      $sender = $_SESSION['userid'];  // Current logged-in user
      $query = "UPDATE message SET seen = 1 WHERE sender = :receiver AND receiver = :sender AND seen = 0";
      return $this->query($query, ['receiver' => $receiver, 'sender' => $sender]);
   }

   // update Recieved State
   public function updateRecievedState($receiver, $sender)
   {
      $updateQuery = "UPDATE message SET received = 1 WHERE receiver = :receiver AND received = 0";
      return $this->query($updateQuery, ['receiver' => $_SESSION['userid']]);
   }

   // Send a new message
   public function sendMessage($receiver, $message)
   {
      $sender = $_SESSION['userid'];
      date_default_timezone_set('Asia/Colombo');
      $date = date("Y-m-d H:i:s");
      $query = "INSERT INTO message (sender, receiver, message, date) VALUES (:sender, :receiver, :message, :date)";
      return $this->write($query, [
         'sender' => $sender,
         'receiver' => $receiver,
         'message' => $message,
         'date' => $date,

      ]);
   }

   public function userDetails($currentUserId)
   {
      $query = "SELECT users.*, 
          (SELECT seen FROM message 
           WHERE (sender = users.id AND receiver = :currentUserId) 
           OR (sender = :currentUserId AND receiver = users.id) 
           ORDER BY date DESC LIMIT 1) AS seen,
          (SELECT date FROM message 
           WHERE (sender = users.id AND receiver = :currentUserId) 
           OR (sender = :currentUserId AND receiver = users.id) 
           ORDER BY date DESC LIMIT 1) AS last_message_date,
          (SELECT COUNT(*) FROM message WHERE sender = users.id AND receiver = :currentUserId AND seen = 0) AS unseen_count
          FROM users
          WHERE users.id != :currentUserId";

      return $this->query($query, ['currentUserId' => $currentUserId]);
   }
}
