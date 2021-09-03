<?php
    ob_start();
    session_start();

    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "musiconline_db";

    $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
    if(!$conn){
        die('Database connection error: ' . mysqli_connect_error());
    }
    else{
//        echo "db connection successful";
    }

    require_once("functions.php");

