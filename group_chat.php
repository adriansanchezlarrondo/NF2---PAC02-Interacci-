<?php

//group_chat.php

include('database_connection.php');
include('class.chatmessage.phpp');

session_start();

$objChatMessage = new ChatMessage($connect);

if($_POST["action"] == "insert_data")
{
	$data = array(
		':from_user_id'		=>	$_SESSION["user_id"],
		':chat_message'		=>	$_POST['chat_message'],
		':status'			=>	'1'
	);

	$objChatMessage->setFromUserID($data[':from_user_id']);
	$objChatMessage->setChatMessage($data[':chat_message']);
	$objChatMessage->setStatus($data[':status']);

	$objChatMessage->save();

	echo $objChatMessage->fetch_group_chat_history($connect);

}

if($_POST["action"] == "fetch_data")
{
	echo $objChatMessage->fetch_group_chat_history($connect);
}

?>