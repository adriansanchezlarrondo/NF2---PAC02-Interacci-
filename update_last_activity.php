<?php

//update_last_activity.php

include('database_connection.php');
require("class.logindetails.php");

session_start();

$objLoginDetails = new LoginDetails($connect, $_SESSION["login_details_id"]);

$objLoginDetails->setLastActivity(date("Y-m-d H:i:s"));

$objLoginDetails->save();

?>

