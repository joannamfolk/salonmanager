<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_POST['food']))
    return;

//Define the query
$sql = "SELECT * FROM food WHERE food_name = :food";

//Prepare the statement
$statement = $dbh->prepare($sql);

//Bind the parameters
$statement->bindParam(':food', $_POST['food'], PDO::PARAM_STR);

//Execute
$statement->execute();

//Return the result
$count = $statement->rowCount();
//echo $_POST['food'].$count;
echo $count;