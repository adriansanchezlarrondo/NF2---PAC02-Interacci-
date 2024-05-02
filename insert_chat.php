<?php

	include('database_connection.php');
	include('class.chatmessage.php');

	session_start();

	$objChatMessage = new ChatMessage($connect);
	
	$data = array(
		':to_user_id'		=>	$_POST['to_user_id'],
		':from_user_id'		=>	$_SESSION['user_id'],
		':chat_message'		=>	$_POST['chat_message'],
		':status'			=>	'1'
	);
	

	$objChatMessage->setToUserId($data[':to_user_id']);
	$objChatMessage->setFromUserID($data[':from_user_id']);
	$objChatMessage->setChatMessage($data[':chat_message']);
	$objChatMessage->setStatus('1');

	$objChatMessage->save();


	echo $objChatMessage->fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $connect);

?>