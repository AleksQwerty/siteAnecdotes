<?php
session_start();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$host = 'localhost';
$user = 'root';
$password = 'root';
$dbname = 'anecdotes';
$link = mysqli_connect($host, $user, $password, $dbname);
mysqli_query($link, "SET NAMES 'utf8");

