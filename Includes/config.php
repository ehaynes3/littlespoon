<?php
//Connection string that allows the page to talk to the database

ob_start(); // Turns on output buffering i.e. Waits for all the php is executed before outputting to the page.
session_start(); // Sessions are ways to saving variables and values after pages have been closed. This one tells us if the user is logged in or not.
date_default_timezone_set("America/New_York");


// Try to connect to the database if it fails it hits the catch block and handles error output
try{
    $con = new PDO("mysql:dbname=netflix_clone;host=localhost", "root", ""); //pdo=php data object - way to create a new connection to the database
    $con-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); //Set error Mode property to error mode warning value. Accessing a static property on the PDO object called ATTERR_MODE



}
catch (PDOException $e) {   // PDOException means its checking for a variable of type PDOException and it will be called $e
    exit("Connection Failed: " . $e->getMessage());

}
?>