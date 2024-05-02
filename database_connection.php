<?php
require("class.pdofactory.php");


//database_connection.php
$connect = PDOFactory::GetPDO("pgsql:dbname=chat;host=localhost;port=5432", "postgres", "postgres", array());
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


date_default_timezone_set('America/New_York');


?>