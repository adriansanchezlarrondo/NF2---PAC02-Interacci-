<?php

//update_is_type_status.php

include('database_connection.php');
include("class.logindetails.php");

session_start();

$objLoginDetails = new LoginDetails($connect, $_SESSION["login_details_id"]);

$objLoginDetails->setIsType($_POST["is_type"]);

$objLoginDetails->save();

?>

