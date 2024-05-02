<?php

include('database_connection.php');
require("class.chatmessage.php");

$objChatMessage = new ChatMessage($connect);

session_start();

echo $objChatMessage->fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $connect);

?>