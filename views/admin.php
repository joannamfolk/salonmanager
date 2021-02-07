<?php

// Error Reporting Turned On
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

include ("header.html");
require ("../login/login-creds.php");

session_start();
if (!isset($_SESSION['loggedin'])) {

    //Store the page that I'm currently on in the session
    $_SESSION['page'] = $_SERVER['SCRIPT_URI'];

    //Redirect to login
    header("location: login.php");
}

