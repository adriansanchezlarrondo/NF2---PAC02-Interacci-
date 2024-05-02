<?php

//remove_chat.php

include('database_connection.php');
require("class.chatmessage.php");

	if(isset($_POST["chat_message_id"])){
		$objChatMessage = new ChatMessage($connect, $_POST["chat_message_id"]);

		$objChatMessage->setStatus('2');

		$objChatMessage->save();

	}

?>
